<?php
/**
 * @todo Bits Field 判斷
 * @todo 用二進位計算可複數選擇的選項數字
 * @example 輸入 7 => 選擇了 1 , 2 , 4 三種選項
 */

# 輸入選擇參數
$input = 7;

# 可用的選項
$options = array(1, 2, 4, 8);

# 檢查選擇了哪些選項
foreach ($options as $option)
{   
    # 二進位交集
    $pick = $option & $input;

    # $pick有值代表包含此選項 加到選擇清單內
    if($pick) $chooses[] = $option;
}

# 執行選擇
foreach ($chooses as $value)
{
    switch ($value)
    {
        case 1:
            echo "choose 1".PHP_EOL;
            break;
        case 2:
            echo "choose 2".PHP_EOL;
            break;
        case 4:
            echo "choose 4".PHP_EOL;
            break;
        case 8:
            echo "choose 8".PHP_EOL;
            break;
        default:
            echo "choose unknown".PHP_EOL;
            break;
    }
}
