<?php
namespace App\Http\Controllers\Manajer;
use App\Http\Controllers\Manajer\ManajerController;

class ShowManajerPage extends ManajerController
{
    public function manajerAdmin() {
        $admin = $this->getAdmin();
        return view('manajer',['admins'=>$admin]);
    }

    public function manajerInsertAdmin() {
        return view('manajerAddAdmin');
    }
}
?>