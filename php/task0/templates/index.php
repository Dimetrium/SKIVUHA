<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title>Книжный Каталог</title>
    <meta name="" content="">
    <link type="text/css" rel="stylesheet" href="stylesheet.css" />
</head>
<body>
    <div id="admin_button"><a class="admin" style="background-color: red;" href="admin.php">Администратор</a>
    </div>
    <div id="header"><a id="header_link" href="index.php">Книжный Каталог</a>
    </div>
    <div id="content">
        <table style="margin: auto;">
            <tr>
                <form method="GET" action="index.php">
                    <td>Название/Автор:
                        <br>
                        <input type="text" name="search" />
                    </td>
                    <td>Жанр:
                        <br>
                        <select name="genre">
                            <option value="">Любой</option>
                            <?=$spisok?>
                        </select>
                    </td>
                    <td>
                        <br>
                        <input type="submit" name="show" value="Показать" />
                    </td>
                </form>
            </tr>
        </table>
        <br>
        <table width="100%" cellpadding="5px" style="<?=$content?>">
            <th>Название</th>
            <th>Автор</th>
            <th>Жанр</th>
            <th>Описание</th>
            <th>Цена</th>
            <?=show?>
        </table>
        <div style="text-align: left;<?=$footer?>">
            Сделать простой книжный каталог.
            <br>
            <br> Условия заказчика:
            <br> Нужно создать веб интерфейс администратора для внесения/редактирования названий книг (и краткого описания о чем книга), цен, авторов и жанров.
            <br>
            <br> Пользователь интернета должен уметь:
            <ol>
                <li>Посмотреть список книг выбирая жанр (книга может принадлежать разным жанрам);</li>
                <li> Посмотреть список книг выбрав автора (книга может принадлежать разным авторам);</li>
                <li> Посмотреть страницу с детальной информацией о понравившейся книге;</li>
                <li> На этой же странице пользователь должен иметь возможность отправить форму заказа этой книги с полями - Адрес, ФИО, Количество экземпляров. Эта форма отправит письмо админу с информацией о книге и информацию о заказчике.</li>
            </ol>
            Дополнительная информация:
            <ul>
                <li> вход в админ часть сделать с помощью .htaccess, информацию о логин/пароле администратора в БД хранить не нужно;</li>
                <li> жанры книг одноуровневые, вложений нет;</li>
                <li> хранить информацию о пользователях сайта не нужно;</li>
                <li> информацию о заказах книг хранить в БД не нужно, она должна оставаться в письмах;</li>
            </ul>
        </div>
    </div>
</body>
</html>