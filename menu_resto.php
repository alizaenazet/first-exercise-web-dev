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
        return $this-> namaHidangan;
    }
    function getHarga(){
        return $this-> harga;
    }
    function getDeskripsi(){
        return $this-> deskripsi;
    }


}

  class ListofMenus{
    private $menus = array();
    

     function setMenu($menuResto){
        $key = $menuResto->getName();
        if (isset($this->menus[$key])) {
            return false;
        }
        $this->menus[$key] = $menuResto;
        return true;
    }

     function getMenu($namaMenu){
         if(isset($menus[$namaMenu])){
            $reqMenu = $menus[$namaMenu];
            return $reqMenu;
        }else {
            return false;
        }
    }

     function getAllMenu(){
            $reqMenus = $this->menus;
        if(isset($reqMenus)){
            return $reqMenus;
        }else {
            return false;
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
        if ($menus->getMenu($nama) != false){
            return false;
        }
        $newMenu = new MenuResto($nama,$harga,$deskripsi);
        if (!$menus->setMenu($newMenu)) {
            return false;
        }
        $currentTempMenu = $_SESSION['listOfMenu'];
        $currentTempMenu[$nama] = $newMenu;
        $_SESSION['listOfMenu'] = $currentTempMenu;
        return true;
    }

    function getAllMenu(){
        global $menus;
        if ($menus->getAllMenu()) {
            return $menus;
        }
        return false;
    }