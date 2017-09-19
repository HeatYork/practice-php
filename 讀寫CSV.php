<?php
/**
 * sm_seq 格式 : 201602AM180000079
 * ^([0-9]{4})([0-9]{2})([A-Z]{1})(M)([0-9]{2})([0-9]{7})$
 * 
 * A.csv 有 N 個 sm_seq 檢查格式正確 寫入 B.csv
 */
function pre_print_r($input)
{
    echo '<pre>';
    print_r($input);
    echo '</pre>';
}

/** 
 * 讀 A.csv
 */
//要讀取的檔案名稱
$filename_A = 'A.csv';
//打開CSV 'r' 讀取模式
$open_A = fopen($filename_A, 'r');

//逐行讀取CSV資料 直到空白行 
while (($read = fgetcsv($open_A)) !== FALSE)
{
    $read_A[] = $read;
}
//關閉檔案
fclose($open_A);

echo 'Read A : <br>';
pre_print_r($read_A);
echo '<hr>';

/** 
 * 寫 B.csv
 */
//要讀取的檔案名稱
$filename_B = 'B.csv';
//打開CSV 'w' 寫入模式(覆寫)
$open_B = fopen($filename_B, 'w');

//sm_seq 格式 '^'起始牆 '$'結尾牆
$format = '/^([0-9]{4})([0-9]{2})([A-Z]{1})(M)([0-9]{2})([0-9]{7})$/';

foreach ($read_A as $key => $value)
{   
    //檢查格式 正確寫入 B.csv
    if (preg_match($format, $value[0], $matches))
    {
        fputcsv($open_B, $value);

        pre_print_r($matches);
    }
}

// 讀 B.csv
$open_B = fopen($filename_B, 'r');

//逐行讀取CSV資料 直到空白行 
while (($read = fgetcsv($open_B)) !== FALSE)
{
    $read_B[] = $read;
}
//關閉檔案
fclose($open_B);

pre_print_r($read_B);

/**把資料重組成 KEY => value
 * [0]name
 * [1]York
 * [2]Heat
 * 變成 [0]['name'] => york
 *      [1]['name'] => Heat
 */
/*function getCSVdata($filename)
{
    $row = 1;//第一行開始
    if(($handle = fopen($filename, "r")) !== false)
    {
       while(($dataSrc = fgetcsv($handle)) !== false)
        {
            $num = count($dataSrc);

            for ($c = 0; $c < $num; $c++)//列 column
            {
                if($row === 1)//第一行作為字段
                {
                    $dataName[] = $dataSrc[$c];//字段名稱
                }
                else
                {
                    foreach ($dataName as $k=>$v)
                    {
                        if($k == $c)//對應的字段
                        {
                            $data[$v] = $dataSrc[$c];
                        }
                    }
                }
            }

            if(!empty($data))
            {
                $dataRtn[] = $data;
                unset($data);
            }
            $row++;
        }
        fclose($handle);
        return $dataRtn;
    }
}

$aData = getCSVdata('A.csv');
print_r($aData);
pre_print_r($aData);*/