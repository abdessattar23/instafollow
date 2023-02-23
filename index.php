<?php
require __DIR__ . '/vendor/autoload.php';
use InstagramScraper\Instagram;

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    
    try {
        $instagram = Instagram::withCredentials(new \GuzzleHttp\Client(), 'your_username', 'your_password', new Psr16Adapter('Files'));
        $instagram->login();
        $account = $instagram->getAccount($username);
        $instagram->follow($account);
        echo "User $username followed successfully!";
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
  try {
        $instagram2 = Instagram::withCredentials(new \GuzzleHttp\Client(), 'your_username', 'your_password', new Psr16Adapter('Files'));
        $instagram2->login();
        $account2 = $instagram2->getAccount($username);
        $instagram2->follow($account2);
        echo "User $username followed successfully!";
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Instagram Scraper</title>
    <style>
        input[type=text], button {
          padding: 10px;
          border: none;
          border-radius: 5px;
          font-size: 16px;
          margin-bottom: 10px;
        }

        button {
          background-color: #4CAF50;
          color: white;
          cursor: pointer;
        }

        button:hover {
          background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="index.php" method="POST">
        <input type="text" name="username" placeholder="Enter Instagram Username">
        <button type="submit" name="submit">Check and Follow</button>
    </form>
</body>
</html>
