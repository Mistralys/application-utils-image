# AppUtils - Image Helper

PHP image helper library for basic image editing and color management.

## Usage

### Create an instance

```php
use AppUtils\ImageHelper;

// From a file
$helper = ImageHelper::createFromFile('image.jpg');

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

### Get image dimensions (including SVG)

```php
use AppUtils\ImageHelper;

$size = ImageHelper::createFromFile('image.jpg')->getSize();

echo $size->toReadableString();
```