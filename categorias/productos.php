
<?php
    header("Content-Type: text/html;charset=UTF-8");

if (!function_exists("GetSQLValueString")) {

    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        $theValue = function_exists("mysql_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }

}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_listado = 9;
$pageNum_listado = 0;
if (isset($_GET['pageNum_listado'])) {
    $pageNum_listado = $_GET['pageNum_listado'];
}
$startRow_listado = $pageNum_listado * $maxRows_listado;

$query_listado = "SELECT * FROM productos WHERE id_cat=$id_cat";
$query_limit_listado = sprintf("%s LIMIT %d, %d", $query_listado, $startRow_listado, $maxRows_listado);
$listado = mysqli_query($tienda, $query_limit_listado) or die(mysql_error());
$row_listado = mysqli_fetch_assoc($listado);

if (isset($_GET['totalRows_listado'])) {
    $totalRows_listado = $_GET['totalRows_listado'];
} else {
    $all_listado = mysqli_query($tienda,$query_listado);
    $totalRows_listado = mysqli_num_rows($all_listado);
    //IMPORTANTE!! Para los acentos
    mysqli_query($tienda,"SET NAMES 'utf8'");

}
$totalPages_listado = ceil($totalRows_listado / $maxRows_listado) - 1;

$queryString_listado = "";
if (!empty($_SERVER['QUERY_STRING'])) {
    $params = explode("&", $_SERVER['QUERY_STRING']);
    $newParams = array();
    foreach ($params as $param) {
        if (stristr($param, "pageNum_listado") == false &&
                stristr($param, "totalRows_listado") == false) {
            array_push($newParams, $param);
        }
    }
    if (count($newParams) != 0) {
        $queryString_listado = "&" . htmlentities(implode("&", $newParams));
    }
}
$queryString_listado = sprintf("&totalRows_listado=%d%s", $totalRows_listado, $queryString_listado);
?>
