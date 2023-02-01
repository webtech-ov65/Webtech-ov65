var currentPopup = null;

function createBoxAndShowPopup(event, cell) {
    createBox(cell);
    showPopup(event, cell);
}

function createBox(element) {
    element.classList.add("box");
}

function showPopup(e, cell) {
    if (currentPopup != null) {
        document.body.removeChild(currentPopup);
    }

    popup = document.createElement("div");
    popup.classList.add("popup", "draggable");
    popup.innerHTML = "";

    var topBar = document.createElement("div");
    topBar.classList.add("top-bar");

    var isDragging = false;
    var offset = { x: 0, y: 0 };

    topBar.addEventListener("mousedown", function(e) {
        isDragging = true;
        offset.x = e.clientX - popup.offsetLeft;
        offset.y = e.clientY - popup.offsetTop;
    });

    document.addEventListener("mousemove", function(e) {
        if (!isDragging) return;
        var left = e.clientX - offset.x;
        var top = e.clientY - offset.y;
        var viewportWidth = window.innerWidth;
        var viewportHeight = window.innerHeight;
        if (left < 0) {
            left = 0;
        } else if (left + popup.offsetWidth > viewportWidth) {
            left = viewportWidth - popup.offsetWidth;
        }
        if (top < 0) {
            top = 0;
        } else if (top + popup.offsetHeight > viewportHeight) {
            top = viewportHeight - popup.offsetHeight;
        }
        popup.style.left = left + "px";
        popup.style.top = top + "px";
    });

    document.addEventListener("mouseup", function() {
        isDragging = false;
    });

    var closeButton = document.createElement("button");
    closeButton.innerHTML = "X";
    closeButton.classList.add("close-popup");
    topBar.appendChild(closeButton);
    closeButton.addEventListener("click", closePopup);
    popup.appendChild(topBar);

    var titleInput = document.createElement("input");
    titleInput.setAttribute("type", "text");
    titleInput.setAttribute("id", "titleInput");
    titleInput.setAttribute("placeholder", "Add title");
    popup.appendChild(titleInput);

    var timeInput = document.createElement("input");
    timeInput.setAttribute("type", "time");
    timeInput.setAttribute("id", "timeInput");
    timeInput.setAttribute("placeholder", "Time");
    popup.appendChild(timeInput);

    var descriptionTextArea = document.createElement("textarea");
    descriptionTextArea.setAttribute("placeholder", "Add description");
    descriptionTextArea.setAttribute("maxlength", "1000");
    popup.appendChild(descriptionTextArea);
    
    var charCountDisplay = document.createElement("div");
    charCountDisplay.setAttribute("id", "charcount");
    charCountDisplay.textContent = "0/1000 characters";
    popup.appendChild(charCountDisplay);
    
    descriptionTextArea.addEventListener("input", function() {
    charCountDisplay.textContent = descriptionTextArea.value.length + "/1000 characters";
    });

    popup.style.left = e.clientX + "px";
    popup.style.top = e.clientY + "px";

    document.body.appendChild(popup);
    titleInput.focus();
    currentPopup = popup;

    var cellTitle = cell.getElementsByClassName("event-title")[0];
    if (cellTitle) {
        titleInput.value = cellTitle.innerHTML;
    }

    var cellTime = cell.getElementsByClassName("event-time")[0];
    if (cellTime) {
        timeInput.value = cellTime.innerHTML;
    }

    var cellDescription = cell.getElementsByClassName("event-description")[0];
    if (cellDescription) {
        descriptionTextarea.value = cellDescription.innerHTML;
    }

    document.addEventListener('mousedown', function(event) {
        var isClickInside = popup.contains(event.target);
        if (!isClickInside) {
            closePopup();
        }
    });

    popup.addEventListener('mousedown', function(event) {
        event.stopPropagation();
    });

    var deleteButton = document.createElement("button");
    deleteButton.classList.add("delete-box");
    deleteButton.innerHTML = "Delete event";
    popup.appendChild(deleteButton);

    deleteButton.addEventListener("click", function() {
        cell.classList.remove("box");
        cell.innerHTML = "";
        cell.style.backgroundColor = "";
        closePopup();
    });

    titleInput.addEventListener("keyup", function(event) {
        if (event.key === "Enter") {
            var titleDiv = cell.getElementsByClassName("event-title")[0];
            if (!titleDiv) {
                titleDiv = document.createElement("div");
                titleDiv.classList.add("event-title");
                cell.appendChild(titleDiv);
            }
            titleDiv.innerHTML = titleInput.value;
        }
    });

    timeInput.addEventListener("keyup", function(event) {
        if (event.key === "Enter") {
            var timeDiv = cell.getElementsByClassName("event-time")[0];
            if (!timeDiv) {
                timeDiv = document.createElement("div");
                timeDiv.classList.add("event-time");
                cell.appendChild(timeDiv);
            }
            timeDiv.innerHTML = timeInput.value;
        }
    });

    descriptionTextArea.addEventListener("keyup", function(event) {
        if (event.key === "Enter") {
            var descriptionDiv = cell.getElementsByClassName("event-description")[0];
            if (!descriptionDiv) {
                descriptionDiv = document.createElement("div");
                descriptionDiv.classList.add("event-description");
                cell.appendChild(descriptionDiv);
            }
            descriptionDiv.innerHTML = descriptionTextarea.value;
        }
    });

cell.addEventListener("contextmenu", function(event) {
    event.preventDefault();
    
    closePopup();

    if (cell.classList.contains("box")) {
        var menu = document.createElement("div");
        menu.classList.add("context-menu");
        menu.style.left = event.pageX + "px";
        menu.style.top = event.pageY + "px";
        
        var deleteOption = document.createElement("div");
        deleteOption.innerHTML = '<i class="fas fa-trash-alt"></i>   Delete';
        deleteOption.classList.add("context-menu-option");
        deleteOption.addEventListener("click", function() {
            cell.classList.remove("box");
            cell.innerHTML = "";
            cell.style.backgroundColor = "";
        closePopup();
        });

        menu.appendChild(deleteOption);
        
        var colorOptions = document.createElement("div");
        colorOptions.classList.add("context-menu-colors");

        var colors = ["#d50000", "#e67c73", "#f4511e", "#f6bf26", "#33b679", "#0b8043", "#039be5", 
        "#3f51b5", "#7986cb", "#8e24aa", "#616161"];
        for (var i = 0; i < colors.length; i++) {

        var colorOption = document.createElement("div");
        colorOption.classList.add("context-menu-color");
        colorOption.style.backgroundColor = colors[i];
        colorOption.addEventListener("click", function(color) {
        return function() {
            cell.style.backgroundColor = color;
            closePopup();

        };

        }(colors[i]));
        colorOptions.appendChild(colorOption);
        }
    }
        
        menu.appendChild(colorOptions);
        
        currentPopup = menu;     
        document.body.appendChild(menu);

        menu.addEventListener('mousedown', function(event) {
            event.stopPropagation();
        });
    
});   
}

function closePopup() {
    if (currentPopup != null) {
        document.body.removeChild(currentPopup);
        document.removeEventListener('mousedown', closePopup);
        currentPopup = null;
    }
}
