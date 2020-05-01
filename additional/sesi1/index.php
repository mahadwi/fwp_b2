<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <header>Header</header>
    <nav>
      <ul>
        <a href="?page=home" <?= isset($_GET['page']) ? $_GET['page'] == 'home' ? 'style="color: silver"' : '' : 'style="color: silver"' ?>>
          <li>HOME</li>
        </a>
        <a href="?page=contact" <a href="?page=contact" <?= isset($_GET['page']) ? $_GET['page'] == 'contact' ? 'style="color: silver"' : '' : '' ?>>
          <li>CONTACT</li>
        </a>
        <a href="?page=about" <a href="?page=about" <?= isset($_GET['page']) ? $_GET['page'] == 'about' ? 'style="color: silver"' : '' : '' ?>>
          <li>ABOUT</li>
        </a>
      </ul>
    </nav>
    <div class="content">
      <main>
        <?php include "content.php" ?>
      </main>
      <aside>
        SIDEBAR
      </aside>
    </div>
    <footer>
      FOOTER
    </footer>
  </div>

</body>

</html>