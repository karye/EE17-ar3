<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro till PHP</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Intro till PHP</h1>
        <?php
        /* Ritning */
        class User {
            /* Denna variabel syns inte utåt: den går inte att nå */
            private $username, $email;

            public function __construct($uname)
            {
                $this->username = $uname;
            }

            /* Denna funktion syns utåt: den går att använda */
            public function addEmail($mail) {
                $this->email = $mail;
            }
        }

        /* Skapa ett objekt */
        $user1 = new User("Karim");
        /* Använd objektets funktion */
        $user1->addEmail("karim@gmail.com");

        /* Skapa ett till objekt */
        $user2 = new User("Emil");
        $user2->addEmail("emil@mail.com");
        ?>
    </div>
</body>
</html>