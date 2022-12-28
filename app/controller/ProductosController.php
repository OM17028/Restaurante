<?php
include_once "app/model/productos.php";
    class ProductosController extends Controller {
        private $productos;
        public function __construct($param){
            $this->productos=new Productos();
            parent::__construct("Productos",$param,true);
            
         }

         public function getAllProductos()
        {
            $records=$this->productos->getAllProductos();
            $info=array('success'=> true,'records'=>$records);
            echo json_encode($info);
        }

        public function getOneProductos()
        {
            $records=$this->productos->getOneProducto($_GET["id"]);
            if (count($records)>0) {
                $info=array('success'=>true,'records'=>$records);
            }else {
                $info=array('success'=>false,'msg'=>"Producto no existe");
            }
            echo json_encode($info);
        }


        public function save()  
        {
            
            $imgp="";
            $imgm="";
            $imgg="";

            if (isset($_FILES["fotop"])) {
                if (is_uploaded_file($_FILES["fotop"]["tmp_name"])) {
                    if (($_FILES["fotop"]["type"]=="image/png") || ($_FILES["fotop"]["type"]=="image/jpeg")) {
                        copy($_FILES["fotop"]["tmp_name"],__DIR__."/../../public_html/fotos/".$_FILES["fotop"]["name"]) or die("No se pudo guardar Archivo");
                        $imgp=URL."public_html/fotos/".$_FILES["fotop"]["name"];
                    }else{
                        $imgp="";
                    }

                    
                }
            }
            if (isset($_FILES["fotom"])) {
                if (is_uploaded_file($_FILES["fotom"]["tmp_name"])) {
                    if (($_FILES["fotom"]["type"]=="image/png") || ($_FILES["fotom"]["type"]=="image/jpeg")) {
                        copy($_FILES["fotom"]["tmp_name"],__DIR__."/../../public_html/fotos/".$_FILES["fotom"]["name"]) or die("No se pudo guardar Archivo");
                        $imgm=URL."public_html/fotos/".$_FILES["fotom"]["name"];
                    }else{
                        $imgm="";
                    }

                    
                }
            }
            if (isset($_FILES["fotog"])) {
                if (is_uploaded_file($_FILES["fotog"]["tmp_name"])) {
                    if (($_FILES["fotog"]["type"]=="image/png") || ($_FILES["fotog"]["type"]=="image/jpeg")) {
                        copy($_FILES["fotog"]["tmp_name"],__DIR__."/../../public_html/fotos/".$_FILES["fotog"]["name"]) or die("No se pudo guardar Archivo");
                        $imgg=URL."public_html/fotos/".$_FILES["fotog"]["name"];
                    }else{
                        $imgg="";
                    }

                    
                }
            }
            if ($_POST["idproducto"]==0) {
                    
                if(count($this->productos->getProductosByName($_POST["nombre"]))>0){
                    
                    $info=array('success'=>false,'msg'=>"Producto existente");
                }else{
                    $records=$this->productos->save($_POST,$imgp,$imgm,$imgg);
                    $info=array('success'=>true,'msg'=>"Producto guardado");
                }


            }else{
                
                if(count($this->productos->getProductoBynameAndId($_POST["nombre"],$_POST["idproducto"]))>1){
                    
                    $info=array('success'=>false,'msg'=>"Producto no existente");
                }else{
                    $records=$this->productos->update($_POST,$imgp,$imgm,$imgg);
                    $info=array('success'=>true,'msg'=>"Producto guardado");
                }

            }
            
            echo json_encode($info);
            
        }
        public function deleteProductos()
        {
            
            $records=$this->productos->deleteProductos($_GET["id"]);
            $info=array('success'=>true, 'msg'=>"Restaurante eliminado");
            echo json_encode($info);
        }

        public function saveI()  
        {
            $records=$this->productos->saveI($_POST);
            $info=array('success'=>true,'msg'=>"Ingrediente guardado");
                     
            echo json_encode($info);
            
        }
}
?>
