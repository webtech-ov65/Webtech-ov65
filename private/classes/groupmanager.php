<?php
final class GroupManager
{
    private $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function get_groups()
    {
        $result = $this->db->query("SELECT * FROM groups");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
