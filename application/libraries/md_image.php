<?php 
if ( ! defined('BASEPATH')) exit('no direct scripting allowed');
/**
* MD класс манипуляции с изображением
* Обрезка и масштабирование изображений с изданными пропорциями
* @пакет CI
* @библиотека
* @верися       1.0  -  24.06.2009
* @Автор   Mihai Dimofti (http://sumi-edesign.ro)
*/

class Md_image
{
/**
* Класс
*/   
    function Md_image()
    {
        $this->ci =& get_instance();
        $this->ci->load->library('image_lib');
    }
/*
* Применить:1. скопировать в папку libraries       
* 2. загрузить библиотеку в ваш контроллер или модель.
* $this->load->library('md_image');     
* 3.использование библиотеки для получения нового изображения:
* $new_img = $this->md_image->crop_to_ratio(-- see above args --);  
* 4.проверить  существует ли  $new_img 
* сейчас у нас есть  $new_img['width'] и $new_img['height'] можно использовать для 
* дальнейших манипуляций в скрипте
* 5.При желании можно использовать  вторую функцию, которая  служит для изменения размера.
* $this->md_image->resize_image($source, 600, 450, $path)
* Примечания:  для примера вызова функции используются пропорции  4:3 
* поэтому размер изображения для примера 600px x 450px которое соответствует пропорциям 4:3
* Обе функции возвращают  FALSE, если возникают какие либо исключения    *
* Получить исходное изображение и обрезать  в нужных пропорциях
* @доступ публичный
* @параметр строка $source    : исходное изображение (должен быть относительно base_url)
* @параметр число  $width :  ширина исходного изображения в пикселях
* @параметр число  $height : высота исходного изображения в пикселях
* @параметр число  $x : соотношение в длину по умолчанию 4 (в соответствии 4:3)
* @параметр число  $y : соотношение в ширину по умолчанию  3 (в соответствии 4:3)
* @параметр строка $dest : значение (путь до base_url)  - если не установлен то будет заменено исходное изображение.
* @возвращаемые параметры
*/
function crop_to_ratio($source, $width, $height, $x = 4, $y = 3, $dest = FALSE)
{
    // раскоментируйте если хотите установить другую библиотеку для обработки изображений
    // $config['image_library'] = 'gd2'; 
       $config['source_image']    = $source;
       $config['maintain_ratio'] = FALSE;
        if($dest)
        {
            $config['new_image'] = $dest;
        }
        $result = array();
        if($width < $height) //проверка является ли изображение вертикальным
        {
            $long = $height;
            $short = $width;
            $xa = 'y';
            $ya = 'x';
            $long_side = 'height';
            $short_side = 'width';
        }
        else // если изображение горизонтально
        {
            $long = $width;
            $short = $height;
            $xa = 'x';
            $ya = 'y';
            $long_side = 'width';
            $short_side = 'height';
        }
        
        
        if($long != (($short * $x) / $y))
        {
            // получим коэффициент  axis
            if(($long / $short) > ($x / $y)) // обрезаем по длинной axis
            {
                $new_long = ($short * $x) / $y;
                $dif = $long - $new_long;
                $config[$xa.'_axis'] = $dif / 2;
                $config[$ya.'_axis'] = 0;
                $config[$long_side] = $new_long + ($dif / 2);
                $config[$short_side] = $short;
                $result[$long_side] = $new_long;
                $result[$short_side] = $short;
            }
            else // обрезаем по короткой axis
            {
                $new_short = ($long * $y) / $x;
                $dif = $short - $new_short;
                $config[$ya.'_axis'] = $dif / 2;
                $config[$xa.'_axis'] = 0;
                $config[$long_side] = $long;
                $config[$short_side] = $new_short + ($dif / 2);
                $result[$long_side] = $long;
                $result[$short_side] = $new_short;
            }
        }
        else // возвращение оригинальных размеров изображения в случае соответствия с нужными пропорциями
        {
            $result['width'] = $width;
            $result['height'] = $height;
            return $result;
        }
        
        $this->ci->image_lib->initialize($config);
        if( ! $this->ci->image_lib->crop())
        {
            $this->ci->image_lib->clear();
            return FALSE;
        }
        else
        {
            $this->ci->image_lib->clear();
            return $result;
        }
        
    }
/*
* Получим исходное изображение и размер желаемого изображения
* @доступ публичный
* @параметр строка    $source    : исходное изображение (должен быть относительно base_url)
* @параметр число    $width :  ширина исходного изображения в пикселях
* @параметр число    $height : высота исходного изображения в пикселях
* @параметр строка   $dest : значение (путь до base_url)  - если не установлен то будет заменено исходное изображение.
* @возвращаемые параметры
*/
    
    function resize_image($source, $width, $height, $dest = FALSE)
    {
        $config['source_image']    = $source;
        if($dest)
        {
            $config['new_image'] = $dest;
        }
        
        $config['width'] = $width;
        $config['height'] = $height;
        
        $this->ci->image_lib->initialize($config);
        if( ! $this->ci->image_lib->resize())
        {
            $this->ci->image_lib->clear();
            return FALSE;
        }
        else
        {
            $this->ci->image_lib->clear();
            return TRUE;
        }
    }
} 
?>