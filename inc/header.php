<body>

    <nav>
        <div>
            <a href="index.php"><h3>FightHub</h3></a>
        </div>
        <button class="nav-toggle">
            <span class="bar-top"></span>
            <span class="bar-mid"></span>
            <span class="bar-bot"></span>
        </button>
    </nav>

    
    <section class="menu-burger">
		<ul>
            <a href="index.php">accueil</a>
            <a href="index.php?page=categories">catégories</a>
            <a href="index.php?page=archives&id=1">archives</a>
            <a href="index.php?page=auteurs">auteurs</a>
            <a href="index.php?page=about">à propos</a>
            <a href="index.php?page=contact">contact</a>
        </ul>

        <?php

            if (isset($_SESSION['id']))
            {
                echo '<a href="index.php?StopSession=yes" class="logout">
                      <img src="img/power-button-red.svg" alt="Power Button">
                      </a>';
            }
            else
            {
                echo '<button class="login">
                      <img src="img/power-button-grey.svg" alt="Power Button">
                      </button>
                      <div class="connect">
                      <form action="index.php" method="post">
                      <input name="login" type="text" placeholder="identifiant">
                      <input name="password" type="text" placeholder="mot de passe">
                      <input type="submit" value="Se connecter">
                      </form>
                      </div>';
            }

        ?>


	</section>

    <main>