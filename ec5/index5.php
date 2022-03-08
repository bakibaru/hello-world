<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ECショップその5</title>
<meta name="description" content="テキストテキストテキストテキストテキストテキストテキストテキスト">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/favicon.ico">
<link rel="stylesheet" href="css/style5.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
</head>

<body>
<header id="header">
  <div class="site-title">
    <a href="index5.php">ECshop5</a>
  </div>

  <nav class="wrapper">
    <ul class="menu">
      <li><a href="#">ALL</a></li>
      <li><a href="#">BUY List</a></li>
    </ul>

    <ul class="login">
      <li><a href="#">LOGIN</a></li>
    </ul>
  </nav>
</header>

<main>
  <div id="item" class="wrapper">
    <div class="item-image">
      <img src="img/kaden.jpg" alt="">
    </div>

    <div class="item-info">
      <h1 class="item-title">家電製品</h1>
      <p>テキストテキストテキストテキストテキストテキストテキスト
         テキストテキストテキストテキストテキストテキストテキスト
         テキストテキストテキストテキストテキストテキストテキスト
      </p>

      <table class="order-table">
        <thead>
          <tr>
            <th class="size">Size</th>
            <th class="price">Price</th>
            <th class="quantity"></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>カメラ</td>
            <td>8,699円</td>
            <td>
              <select name="quantity_1">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </td>
          </tr>

          <tr>
            <td>ルンバ</td>
            <td>10,720円</td>
            <td>
              <select name="quantity_2">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </td>
          </tr>

          <tr>
            <td>スタンド</td>
            <td>4,255円</td>
            <td>
              <select name="quantity_3">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </td>
          </tr>

          <tr>
            <td>炊飯器</td>
            <td>6,190円</td>
            <td>
              <select name="quantity_4">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </td>
          </tr>

          <tr>
            <td>オーブントースター</td>
            <td>8,294円</td>
            <td>
              <select name="quantity_5">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </td>
          </tr>
        </tbody>

      </table>

      <a class="cart-bin" href="#">ADD TO CART</a>

    </div>
  </div>
</main>

<footer id="footer" class="wrapper">
  <p class="copyright">&copy; ECShop5</p>
</footer>

</body>
</html>
