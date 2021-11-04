<?php
class ProductModel{
    
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda_videojuegos;charset=utf8', 'root', '');
    }
    
    function getProduct($id){
        $query = $this->db->prepare("SELECT * FROM producto WHERE id_producto=?");
        $query->execute(array($id));
        $producto = $query->fetch(PDO::FETCH_OBJ);
        return $producto;
    }
    function getProductsByGenre($id){
        $query = $this->db->prepare("SELECT * FROM producto WHERE id_genero=?");
        $query->execute(array($id));
        $producto = $query->fetch(PDO::FETCH_OBJ);
        return $producto;
    }

    function getProducts(){
        $query = $this->db->prepare("SELECT  * FROM producto");
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
    
    //function genre is related with product
    //consultar si el genero esta en product
    
    function getInner(){
        $query = $this->db->prepare("SELECT * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero)");
        $query->execute();
        $inner = $query->fetchAll(PDO::FETCH_OBJ);
        return $inner;
    }

    function insert($nombre, $descripcion, $precio, $id_genero){
        $query = $this->db->prepare("INSERT INTO producto(nombre, descripcion, precio, id_genero) VALUES(?, ?, ?, ?)");
        $query->execute(array($nombre,$descripcion,$precio, $id_genero));
    }
   
    // function arregloBugxd($xd){
    //         $query = $this->db->xdxdxdxdxdxdxdxdxd;
    //         $query->execute(array($xd));
               //hago este cambio en la funcion en la rama bug-001 en mi repositorio local, despues, hago el merge en secundaria y guardo los
               //cambios con add y commit, y luego el push
    // }
        
    function updatedb($id,$nombre,$descripcion,$precio){
        $query = $this->db->prepare("UPDATE producto SET `nombre`='$nombre',`descripcion`='$descripcion',`precio`='$precio' WHERE id_producto=?");
        $query->execute(array($id));
    }

    // function chayanne ($una vida sin ti) {
        // $variable = "michael jackson sigue vivo?";
        // return variable;
    //}
 
}