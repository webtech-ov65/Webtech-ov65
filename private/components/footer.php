            </main>
        </div>
        
        <footer class="navbar">
            <div class="container">
                <p>
                    <?php

                    $str = file_get_contents('https://en.wikipedia.org/w/api.php?action=query&format=json&prop=extracts&titles=Digital%20calendar&formatversion=2&exchars=137&exintro=1&explaintext=1');

                    $json = json_decode($str, true); 

                    $extract = $json['query']['pages'][0]['extract'];

                    echo $extract

                    ?> 
                    <br>
                    &copy; <?= date('Y'); ?> <?= join(', ', $app['authors']); ?>. All rights reserved.</p>
            </div>
        </footer>
        
        <script src="assets/script.js"></script>
    </body>
</html>
