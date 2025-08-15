<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel & MySQL DB Connection</title>
</head>
<body>
    <div>
        <?php  
            try {
                if(DB::connection()->getPDO()) {
                    echo "Successfully connected to DB. The database name is: " . DB::connection()->getDatabaseName();
                }
            } catch (\Exception $e) {
                echo "Could not connect to the database. Error: " . $e->getMessage();
            }
        ?>
    </div>
</body>
</html>