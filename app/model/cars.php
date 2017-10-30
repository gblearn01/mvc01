<?php

$current_view = $config['VIEW_PATH'] . 'cars' . DS;
$file = $config['DATA_PATH'] . 'cars.txt';

switch (get('action')){
    case 'view':{
        $view = $current_view . 'view.phtml';
        $cars = file($file);
        break;
    }
    case 'delete':{
        $view = $current_view . 'delete.phtml';
        $id = get('id');
        $cars = file($file);
        foreach ($cars as $index => $car) {
            $fileds = explode(',',$car);
            if ($fileds[0] == $id) {
                    unset($cars[$index]);
                    break;
            }
        }
        file_put_contents($file,implode('',$cars));
        header('location: /?page=cars&action=view');

        break;
    }
    case 'update':{
        $view = $current_view . 'update.phtml';
        $cars = file($file);
        $id = get('id');
        $car_to_update = '';
        foreach ($cars as $index => $car) {
            $fileds = explode(',',$car);
            if ($fileds[0] == $id) {
                $car_to_update = $fileds;
                break;
            }
        }
        break;
    }
    case 'doUpdate':{
        $id = get('id');
        $updated_car = $id . ',' . get('make') . ',' . get('model') . ','. get('year') . ','. get('price'). PHP_EOL;
        $cars = file($file);
        foreach ($cars as $index => $car) {
            $fileds = explode(',',$car);
            if ($fileds[0] == $id) {
                $cars[$index] = $updated_car;
                break;
            }
        }

        file_put_contents($file,implode('',$cars));
        header('location: /?page=cars&action=view');
    }

    case 'add':{
        $view = $current_view . 'add.phtml';
        break;
    }
}

