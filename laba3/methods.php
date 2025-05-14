<form action="methods.php" method="post" enctype="multipart/form-data">
  <input name="name" value="Имя для картинки" type="text"><br>
  <input name="myfile" type="file"><br>
  <input value="Загрузить" type="submit">
</form>

<?php

// Подключение файла конфигураций.
include_once('classes/Config.php');
// Создание объекта конфига.
$config = new Config();
// Вывод переменной name из конфигурации.
echo $config->get('name');

// Открываем файл для чтения и записи
$uploadfile = './uploads/' . time() . ".jpg"; // генерируем уникальное имя файла
move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile); // перемещаем файл

// Путь к файлу, где будем хранить список загруженных изображений
$filename = 'upload_images.txt';

// Если файл существует, читаем его содержимое в массив
if (file_exists($filename)) {
    $fileContent = file($filename, FILE_IGNORE_NEW_LINES); // Читаем файл построчно
} else {
    $fileContent = []; // Если файл не существует, создаем пустой массив
}

// Добавляем новое изображение в список
$fileContent[] = $uploadfile;

// Сохраняем обновленный список в файл
file_put_contents($filename, implode(PHP_EOL, $fileContent));

// Выводим последний загруженный файл
echo "Последний файл: " . $uploadfile . "<br>";

// Выводим все изображения из файла
echo "Список всех файлов:<br>";
foreach ($fileContent as $val) {
    echo '<img style="width:100px;height:100px" src="' . $val . '"><br>';
}

// Выводим загруженную картинку с описанием
echo "<br>";
echo '<img src="' . $uploadfile . '"><br>' . $_POST['name'];
?>
