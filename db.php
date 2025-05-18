<?php


class Database
{
    public $pdo;

    public function __construct()
    {
        $username = "root";
        $passwordname = "";
        $dsn = "mysql:host=localhost";

        try {
            $this->pdo = new pdo($dsn, $username, $passwordname);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Подключение к MySQL прошло успешно!";
        }
        catch(PDOException $e) {
            echo "Подключение не произведено: " . $e->getMessage();
        };
        
    }

    public function execute($sql)
    {
        $this->pdo->exec($sql);
    }

    public function print_countries()
    {
        $result = $this->pdo->prepare('SELECT ID, COUNTRY FROM Countries');
        $result->execute();


        for($i=0; $row = $result->fetch(); $i++){
                ?>
                <tr>
                        <td><label><?php echo $row['ID']; ?></label></td>
                        <td><label><?php echo $row['COUNTRY']; ?></label></td>
                </tr>

        <?php } 
    }


    public function print_cities()
    {
        $result = $this->pdo->prepare('SELECT ID, CITY, COUNTRY_ID FROM Cities');
        $result->execute();


        for($i=0; $row = $result->fetch(); $i++){
                ?>
                <tr>
                        <td><label><?php echo $row['ID']; ?></label></td>
                        <td><label><?php echo $row['CITY']; ?></label></td>
                        <td><label><?php echo $row['COUNTRY_ID']; ?></label></td>
                </tr>

        <?php } 
    }


    public function print_users()
    {
        $result = $this->pdo->prepare('SELECT ID, FIRST_NAME, LAST_NAME, CITY_ID FROM Users');
        $result->execute();


        for($i=0; $row = $result->fetch(); $i++){
                ?>
                <tr>
                        <td><label><?php echo $row['ID']; ?></label></td>
                        <td><label><?php echo $row['LAST_NAME'] . ' ' . $row['FIRST_NAME']; ?></label></td>
                        <td><label><?php echo $row['LAST_NAME']; ?></label></td>
                        <td><label><?php echo $row['CITY_ID']; ?></label></td>
                </tr>

        <?php } 
    }

    public function sort()
    {

    }

    //function function filter()
    //{
        
    //}

    
}

?>