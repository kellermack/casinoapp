<?php

class Database
{

    const TOURNAMENT_TABLE = 'tournaments';
    const IMPORT_FOLDER = 'import';
    const ARCHIVE_FOLDER = 'archive';
    const CONFIG_FILE = 'config.php';

    private $connection;
    private $importPath;
    private $archivePath;
    private $config;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        // load our custom settings from config file
        $this->config = include(self::CONFIG_FILE);

        // then use it to connect to the database
        $this->connectToDb();
    }

    /**
     * Connect to mysql database
     *
     * @throws Exception
     */
    private function connectToDb(){
        // make sure all needed info is present
        if (!isset(
            $this->config['server'],
            $this->config['user'],
            $this->config['password'],
            $this->config['database']
        )) {
            throw new Exception('Config file is missing param(s)');
        }

        // connect to the DB
        $this->connection = new mysqli($this->config['server'], $this->config['user'], $this->config['password'],
            $this->config['database']);
    }

    /**
     * Returns an array of all the casino names in our tournament table
     *
     * @return array
     * @throws Exception
     */
    public function getCasinoNames()
    {
        // make the sql query
        $sql = 'SELECT DISTINCT casino FROM ' . self::TOURNAMENT_TABLE;

        // run it
        $result = $this->query($sql);

        // get an empty array to hold the results
        $casinos = [];

        // loop through the results
        foreach ($result as $row) {
            // results come back one row at a time
            // each row is an array with the column names as the array keys
            $casinos[] = $row['casino']; // grabs the casino column value from each row and puts it in our array
        }

        // return the result
        return $casinos;
    }
    
    
    
        public function getCasinoDates()
    {
        // make the sql query
        $sql = 'SELECT DISTINCT schedule FROM ' . self::TOURNAMENT_TABLE;

        // run it
        $result = $this->query($sql);

        // get an empty array to hold the results
        $schedules = [];

        // loop through the results
        foreach ($result as $row) {
            // results come back one row at a time
            // each row is an array with the column names as the array keys
            $schedules[] = $row['schedule']; // grabs the schedule column value from each row and puts it in our array
        }

        // return the result
        return $schedules;
    }
     
    
    
    public function getS_points()
    {
        // make the sql query
        $sql = 'SELECT DISTINCT s_points FROM ' . self::TOURNAMENT_TABLE;

        // run it
        $result = $this->query($sql);

        // get an empty array to hold the results
        $s_points = [];

        // loop through the results
        foreach ($result as $row) {
            // results come back one row at a time
            // each row is an array with the column names as the array keys
            $s_points[] = $row['s_point']; // grabs the s_points column value from each row and puts it in our array
        }

        // return the result
        return $s_points;

    /**
     * Create table and import all in one step
     */
    public function install()
    {
        $this->createTournamentTable();
        $this->import();
    }

    /**
     * Generate the table if it doesn't already exist in our DB
     *
     * @throws Exception
     */
    private function createTournamentTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS ' . self::TOURNAMENT_TABLE . '
            (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `grouping` VARCHAR(64),
                `casino` VARCHAR(64),
                `game` VARCHAR(64),
                `schedule` datetime,
                `cost` VARCHAR(64),
                `fee_percent` VARCHAR(64),
                `s_points` VARCHAR(64),
                `notes` VARCHAR(64),
                PRIMARY KEY (`id`)
            );';
        $this->query($sql);
    }

    /**
     * Runs a query on the DB
     *
     * @param string $sql
     * @return bool|mysqli_result
     * @throws Exception
     */
    private function query($sql)
    {
        $result = $this->connection->query($sql);
        if ($result === false) {
            // TODO: some kind of error handling?
            throw new Exception('Database error: ' . $this->connection->error);
        }
        return $result;
    }

    /**
     * Import the first file we find in the import folder, that way the name can be whatever we want it to be
     *
     * @throws Exception
     */
    public function import()
    {
        // load info about the import and archive directories
        $this->loadDirectoryInfo();

        // pull in all csv files in our import directory
        $csvFiles = glob($this->importPath . DIRECTORY_SEPARATOR . '*.csv');
        // we only want one file so grab the first we find
        if (!isset($csvFiles[0])) {
            throw new Exception('No import files found');
        }
        $importFile = $csvFiles[0];

        // load data from the import file
        $data = $this->getFileData($importFile);

        // TODO: should probably separate some of the following into its own functions like we did for getFileData
        // TODO: that way our import function here remains neat and tidy

        // now clear the DB table
        $sql = 'TRUNCATE ' . self::TOURNAMENT_TABLE;
        $this->query($sql);


        // now build our import query, first the data...
        $insertValues = [];
        foreach ($data as $row) {
            // we need to convert the data to our formats as well (like combining Date and Time)
            $dateTime = strtotime($row['Date'] . ' ' . $row['Time']);
            $dateTime = date('Y-m-d H:i:s', $dateTime);
            // here we take all the data, separate it with commas and quote it, then add it to an array
            // so this $values here will look like: "grouping", "casino", "game" ...etc
            // we use implode just so we don't have to type a ton of quotes, commas, and periods to get this
            // into a usable string
            $values = implode('", "', [
                $row['Grouping'],
                $row['Casino'],
                $row['Game'],
                $dateTime,
                $row['Cost'],
                $row['Vig%'],
                $row['S-Points'],
                $row['Notes'],
            ]);
            // now put it into parens
            $values = '("' . $values . '")';
            // and add it to this array
            $insertValues[] = $values;
        }

        // now we add all the values we put into those nice parens, and commas separate them
        $sql = 'INSERT INTO ' . self::TOURNAMENT_TABLE
            . '(grouping, casino, game, schedule, cost, fee_percent, s_points, notes) VALUES '
            . implode(', ', $insertValues);

        // finally, execute this giant insert statement
        // the final result of $sql should look like "INSERT INTO tournaments (column1, column2...)
        // VALUES (val1a, val2a...), (val1b, val2b...), ...etc
        $this->query($sql);

        // ok cool, now let's archive it so we don't import it again
        $this->archive($importFile);
    }

    /**
     * Generate directory paths for import and archive directories
     */
    private function loadDirectoryInfo()
    {
        // do nothing if we've already loaded this info
        if ($this->importPath) {
            return;
        }

        // load the import directory information
        $this->importPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . self::IMPORT_FOLDER;

        // if the import directory doesn't exist, we should create it
        $this->initDirectory($this->importPath);

        // same with our archive directory
        $this->archivePath = $this->importPath . DIRECTORY_SEPARATOR . self::ARCHIVE_FOLDER;
        $this->initDirectory($this->archivePath);
    }

    /**
     * Creates a directory if it doesn't exist
     *
     * @param string $directory
     * @return bool
     */
    private function initDirectory($directory)
    {
        return @mkdir($directory, 0777, true);
    }

    /**
     * Loads a given file into an array
     *
     * @param string $file
     * @return array
     */
    private function getFileData($file)
    {
        // read the file contents and put it into an array we can use
        $headers = null; // this is where we store the column names (the first line in a csv)
        $data = []; // this is where we will store the csv data

        // first, open the file
        if ($handle = fopen($file, 'r')) {

            // now loop through each row
            while (($row = fgetcsv($handle)) !== false) {
                // we should trim each element because the export has weird spacing
                $row = array_map('trim', $row);

                if (!$headers) {
                    // if we haven't set the header, that means this is the first row (where the headers are)
                    $headers = $row;

                    // the data is kind of garbage in that the last column has no header, so let's just remove that
                    array_pop($headers);
                } else {
                    // otherwise, we're looking at data
                    if (count($row) > count($headers)) {
                        // combine the notes2 field with the notes field if it's there
                        $notes2 = array_pop($row);
                        $row[9] .= " | $notes2";
                    }

                    // use $header array as the keys for each cell by using array_combine
                    $data[] = array_combine($headers, $row);
                }
            }
            // close the file, we're done
            fclose($handle);
        }

        return $data;
    }

    /**
     * Appends the date and time to a filename, then moves the file into the archive directory
     *
     * @param string $file
     */
    private function archive($file)
    {
        // we will move it into an archive folder, adding a timestamp to make sure the filename is unique
        $newFilename = $this->archivePath . DIRECTORY_SEPARATOR . basename($file, ".php")
            . date('Ymd-His') . '.csv';
        rename($file, $newFilename);
    }
    
     
        
        
    

}
