<?php
require_once("model.php");

class Checkout extends Model
{
    function save($data)
    {
        // Ensure PhuongThucTT is provided in $data or set a default value
        if (!isset($data['PhuongThucTT'])) {
            $data['PhuongThucTT'] = 'default_value'; // Replace 'default_value' with your actual default value
        }

        // Escape and quote all values for safe insertion into SQL query
        foreach ($data as $key => $value) {
            $data[$key] = $this->conn->real_escape_string($value);
        }

        // Prepare fields and values for INSERT query
        $fields = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";

        // Construct INSERT query for HoaDon table
        $query = "INSERT INTO HoaDon ($fields) VALUES ($values)";

        // Execute INSERT query for HoaDon table
        $status = $this->conn->query($query);

        // Check if the INSERT operation was successful
        if ($status === TRUE) {
            // Retrieve the last inserted ID (MaHD)
            $lastInsertedID = $this->conn->insert_id;

            // Insert each product detail into chitiethoadon table
            foreach ($_SESSION['sanpham'] as $value) {
                $MaSP = $value['MaSP'];
                $SoLuong = $value['SoLuong'];
                $DonGia = $value['DonGia'];

                // Construct INSERT query for chitiethoadon table
                $query_ct = "INSERT INTO chitiethoadon (MaHD, MaSP, SoLuong, DonGia) 
                             VALUES ('$lastInsertedID', '$MaSP', '$SoLuong', '$DonGia')";

                // Execute INSERT query for chitiethoadon table
                $status_ct = $this->conn->query($query_ct);
                
                // Check if each detail insert was successful
                if ($status_ct !== TRUE) {
                    // Handle error if needed
                    // Example: Log error, rollback transaction, etc.
                }
            }

            // Redirect to order complete page if everything is successful
            setcookie('msg', 'Đăng ký thành công', time() + 2);
            header('location: ?act=checkout&xuli=order_complete');
        } else {
            // Handle error if the main order insert fails
            setcookie('msg', 'Đăng ký không thành công', time() + 2);
            header('location: ?act=checkout');
        }
    }
}
?>
