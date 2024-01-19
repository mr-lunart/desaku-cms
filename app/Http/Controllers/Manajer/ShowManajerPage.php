<?php
namespace App\Http\Controllers\Manajer;

use App\Models\Admin;
use App\Http\Controllers\Manajer\ManajerController;

class ShowManajerPage extends ManajerController
{
    public function manajerAdmin() {
        $admin = $this->getAdmins();
        return view('manajer',['admins'=>$admin]);
    }
}
?>