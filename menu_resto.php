<?php class MenuResto{
   private $namaHidangan;
    private $harga;
    private $deskripsi;

    function __construct($nama,$harga,$deskripsi) {
        $this->namaHidangan = $nama; 
        $this->harga = $harga; 
        $this->deskripsi = $deskripsi; 
      }

    function setNamaHidangan($nama){
        $this->namaHidangan = $nama;
    }
    function setHarga($harga){
        $this->harga = $harga;
    }
    function setDeskripsi($deskripsi){
        $this->namaHidangan = $deskripsi;
    }

    function getName(){
        return $this -> namaHidangan;
    }
    function getHarga(){
        return $this -> harga;
    }
    function getDeskripsi(){
        return $this -> deskripsi;
    }


}

  class ListofMenus{
    private $menus = array();

     function setMenu($menuResto){
        $key = $menuResto->getName();
        if ($this->menus[$key]) {
            return false;
        }
        $this->menus[$key] = $menuResto;
        return true;
    }

     function getMenu($namaMenu){
         $reqMenu = $this->$menus[$namaMenu];

        if( $reqMenu){
            return $reqMenu;
        }else {
            return null;
        }
    }

     function getAllMenu(){
            $reqMenus = $this->menus;
        if( $reqMenus){
            return $reqMenus;
        }else {
            return null;
        }
    }

     function deleteMenu($namaMenu){
        if ($menus[$namaMenu]) {
            unset($menus[$namaMenu]);
            return true;
        }
        return false;
    }


}

     $menus = new ListofMenus();

    function getMenu($namaMenu){
        global $menus;
        return $menus->getMenu($namaMenu);
    }

    function hapusMenu($namaMenu){
        global $menus;
        if ($menus->deleteMenu($namaMenu)) {
            $_SESSION['listOfMenu'] = getAllMenu();# code...
        };
    }
    
    function editMenu($menu){
        global $menus;
        $menus->setMenu($newMenu);
        $_SESSION['listOfMenu'] = getAllMenu();
    }
    
    function addMenu($nama,$harga,$deskripsi){
        global $menus;
        echo $menus->getMenu($newMenu);
        if (!$menus->getMenu($newMenu)) {
            $newMenu = new MenuResto($nama,$harga,$deskripsi);
            $menus->setMenu($newMenu);
            $_SESSION['listOfMenu'] = getAllMenu();
            return true;
        }
        return false;
    }

    function getAllMenu(){
        global $menus;
        if ($menus->getAllMenu() !== null) {
            return $menus;
        }
        return false;
    }?>