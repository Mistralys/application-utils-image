# AppUtils - Image Helper

PHP image helper library for basic image editing and color management.

## Usage

### Image file classes

The library provides classes for handling different image formats:

`JPGFile`, `PNGFile` and `SVGFile`. These classes work like the `FileInfo`
class provided by the File Helper, so they provide all typical file 
operation methods as well as specialized image-related methods.

```php
use AppUtils\ImageHelper\ImageFiles\FileTypes\JPGFile;

// Resample an image, and send it to the browser
JPGFile::factory('image.jpg')
    ->resampleByWidth('thumbnail.jpg', 200)
    ->send();
```

### Create an instance

```php
use AppUtils\ImageHelper;
use AppUtils\ImageHelper\ImageFiles\FileTypes\JPGFile;

// From a file path
$helper = ImageHelper::createFromFile('image.jpg');

// From an image class
$helper = JPGFile::factory('image.jpg')->createImageHelper();

// From a resource    
$resource = imagecreatefromjpeg('image.jpg');
$helper = ImageHelper::createFromResource($resource);

// New blank image
$helper = ImageHelper::createNew(200, 100);
```

### Resize an image

```php
use AppUtils\ImageHelper;

ImageHelper::createFromFile('image.jpg')
    ->resampleByWidth(200)
    ->save('resized.jpg');
```

Or using the `JPGFile` class:

```php
use AppUtils\ImageHelper\ImageFiles\FileTypes\JPGFile;

JPGFile::factory('image.jpg')
    ->resampleByWidth('resized.jpg', 200);
```

### Get image dimensions (including SVG)

```php
use AppUtils\ImageHelper;

$size = ImageHelper::createFromFile('image.jpg')->getSize();

echo $size->toReadableString();
```