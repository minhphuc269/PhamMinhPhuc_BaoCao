<?php
use App\Models\Menu;
$mod_footermenu=menu::where([['position','=','footermenu'],['status','=',1]])
->orderBy('sort_order','ASC')
->get()
?>
<h3 class="widgettilte">
                  <strong>Liên hệ</strong>
               </h3>
               <ul class="footer-menu">
                <?php foreach($mod_footermenu as $rowmenu):?>
                  <li><a href="<?=$rowmenu->link;?>"><?=$rowmenu->name;?></a></li>
                  <?php endforeach;?>           
               </ul>
               <h3 class="widgettilte mt-3">GOOGLE MAP</h3>
<div class="map my-3">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.6889915209813!2d106.77566677485771!3d10.835095689317246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527046a5c9b93%3A0x7005b0fbba5feca4!2zMjIgxJDGsOG7nW5nIHPhu5EgOSwgVMSDbmcgTmjGoW4gUGjDuiBCLCBRdeG6rW4gOSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1700103474111!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>