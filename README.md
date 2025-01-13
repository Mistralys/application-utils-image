# AppUtils - Image Helper

PHP image helper library for basic image editing and color management.

# Features

- Dedicated image file classes, e.g. `JPGFile`, `SVGFile`.
- Resample images by width, height, or both.
- Get image dimensions, SVG files included.
- Crop images.
- Sharpen images.
- Trim images.
- Work with alpha transparency.
- Add text to images.
- Calculate the average color of an image.
- Calculate the brightness or luma value of an image.
- Work with a mix of HEX, 8Bit, 7Bit and percentage-based color values. 

# Requirements

- PHP 7.4 or higher
- [Composer](https://getcomposer.org)
- GD extension

# Usage

## Image file classes

The library provides classes for handling different image formats:

- `GIFFile`
- `JPGFile` and `JPEGFile`
- `PNGFile`
- `SVGFile`
 
These classes work like the `FileInfo` class provided by the File Helper,
so they provide all typical file operation methods as well as specialized 
image-related methods.

## Simple image operations

The image file class methods will immediately save the modifications 
to the file system. If you want to perform multiple operations before saving, 
you will have to use an `ImageHelper` instance instead.

### Resampling by width

This resamples the image to a new width, adjusting the height to keep the
original image aspect ratio.

```php
use AppUtils\ImageHelper\ImageFiles\FileTypes\JPGFile;

JPGFile::factory('image.jpg')
    ->resampleByWidth('resized.jpg', 200);
```

### Resampling by height

This resamples the image to a new height, adjusting the width to keep the
original image aspect ratio.

```php
use AppUtils\ImageHelper\ImageFiles\FileTypes\JPGFile;

JPGFile::factory('image.jpg')
    ->resampleByHeight('resized.jpg', 200);
```

### Resampling without the aspect ratio

This resamples the image to a new width and height, ignoring the original
image aspect ratio.

```php
use AppUtils\ImageHelper\ImageFiles\FileTypes\JPGFile;

JPGFile::factory('image.jpg')
    ->resample('resized.jpg', 200, 400);
```

### Displaying an image in the browser

Send an image file to the browser for display.
This automatically sets the correct headers for the 
image format.

```php
use AppUtils\ImageHelper\ImageFiles\FileTypes\JPGFile;

JPGFile::factory('image.jpg')
    ->send('optional-name.jpg');

// You must manually exit the script after sending the image.
exit;
```

### Trigger the download of an image

This will send the image to the browser, and force it to
treat it as a download and show the download dialog.

```php
use AppUtils\ImageHelper\ImageFiles\FileTypes\JPGFile;

JPGFile::factory('image.jpg')
    // Set the second parameter to true to force the download.
    ->send('optional-name.jpg', true);

// You must manually exit the script after sending the image.
exit;
```

## Advanced editing

### The ImageHelper class

While the image file classes are practical for simple operations, the 
`ImageHelper` class provides more advanced editing capabilities, as
well as combining multiple operations in a single chain.

### Creating an instance

```php
use AppUtils\ImageHelper;
use AppUtils\ImageHelper\ImageFiles\FileTypes\JPGFile;

// From a file path
$helper = ImageHelper::createFromFile('image.jpg');

// From an image class
$helper = JPGFile::factory('image.jpg')->createImageHelper();

// From a GD resource    
$resource = imagecreatefromjpeg('image.jpg');
$helper = ImageHelper::createFromResource($resource);

// New blank image
$helper = ImageHelper::createNew(200, 100);
```

### Examples

#### Resampling an image

```php
use AppUtils\ImageHelper;

ImageHelper::createFromFile('image.jpg')
    ->resampleByWidth(200)
    ->save('resized.jpg');
```

#### Sharpening an image

This will sharpen the image by the given percentage.

> NOTE: For best results, do some testing to find the 
> optimal sharpening percentage for your target image size.

```php
use AppUtils\ImageHelper;

ImageHelper::createFromFile('image.jpg')
    ->resampleByWidth(200)
    ->sharpen(50)
    ->setQuality(80)
    ->save('sharpened.jpg');
```

#### Get image dimensions (including SVG)

```php
use AppUtils\ImageHelper;

$size = ImageHelper::getImageSize('image.jpg');

echo $size->toReadableString();
```

### Freeing resources

When you're done editing, call the `dispose()` method to 
release file handles and memory resources. By default, 
the `save()` method will automatically do this for you.
In case you're not saving the image, you should call
`dispose()` manually.

```php
use AppUtils\ImageHelper;

$average = ImageHelper::createFromFile('image.jpg')
    ->calcAverageColorRGB();

// Not needed anymore? Free up resources.    
$helper->dispose();
```
