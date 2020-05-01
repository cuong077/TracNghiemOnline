<?php

class Home extends Controller{

    function index(){
        

        $productmodel = $this->model("ProductModel");

        $products = $productmodel->getAllProduct(0, 10);
        
        $categorymodel = $this->model("CategoryModel");

        $category_list = $categorymodel->getAllCategory();
        
        $this->view("simple", [
            "Page"  => "simple_home",
            "title" => "Trang chủ",
            "products" => $products,
            "category_list" => $category_list
        ]);

    }



    public function showCategory($id){

        $error = [];

        $productmodel = $this->model("ProductModel");

        $products = $productmodel->getAllProductWithCategory($id,0, 10);

        $categorymodel = $this->model("CategoryModel");

        $category = $categorymodel->getCategory($id);


        $this->view("simple", [
		    "Page"  => "simple_category",
            "title" => "Loại",
            "products" => $products,
            "category" => $category,
            "error" => $error
            
		]);
    }

    function Show($a, $b){
        // Call Models
        $teo = $this->model("SinhVienModel");
        $tong = $teo->Tong($a, $b); // 3
        // Call Views
        $this->view("aodep", [
            "Page"=>"news",
            "Number"=>$tong,
            "Mau"=>"red",
            "SoThich"=>["A", "B", "C"],
            "SV" => $teo->SinhVien()
        ]);
    }


}
?>