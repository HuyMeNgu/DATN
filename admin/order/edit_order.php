<?php
class func{
    function isGET()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
    function isPOST(){
        return $_SERVER['REQUEST_METHOD'] === 'POST';        
    }
    function filter()
    {
        $filterArr = [];

        // Lọc các tham số từ phương thức GET
        if ($this->isGET())
        {
            $filterArr += filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        // Lọc các tham số từ phương thức POST
        if ($this->isPOST())
        {
            $filterArr += filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $filterArr;
    }
}
$func = new func();
    
if($func->isPOST() && isset($_POST['update'])|| isset($_POST['cancel']))
{
    $fillterAll = $func->filter();
    if(isset($_POST['update']))
    {
        $id = $fillterAll['id'];
        $status_afer = $fillterAll['status']+1;
        $status_update = $mysqli->query("UPDATE orders SET status = $status_afer WHERE id = $id ");
        if($status_update){
            $data = [
                'order_id' => $id,
                'admin_id' => getSession('admin_id'),
                'step_name' => $f->trangthai($status_after),
                'note' => $fillterAll['ghichu'],
                'update_at' => date('Y-m-d H:i:s'),
            ];
            // $mysqli->query('INSERT INTO order_step (order_id, admin_id, step_name,note, update_at) VALUES ($id, $f->trangthai($status_after),date('Y-m-d H:i:s'))');
        } else{

        }
    }
}
?>

