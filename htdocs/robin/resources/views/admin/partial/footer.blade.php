
 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
 <!--<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
        <div class="modal-dialog max-WT-450" role="document">
            <div class="modal-content text-center">
                <div class="modal-body custome-modla-body min-ht-300 d-flex align-items-center justify-content-center">
                                    <div class="w-100">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <img src="images/icon-logout.png" class="logOut-img" alt="">
                        <h5 class="mb40 gill">Are you sure you want to Delete?</h5>
                        <a type="submit" id="modalSubmit" class="btn btn-primary max-WT-140">YES</a>
                        <button type="button" class="btn btn-primary max-WT-140" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="blockModal" tabindex="-1" role="dialog">
        <div class="modal-dialog max-WT-450" role="document">
            <div class="modal-content text-center">
                <div class="modal-body custome-modla-body min-ht-300 d-flex align-items-center justify-content-center">
                                    <div class="w-100">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <img src="images/icon-logout.png" class="logOut-img" alt="">
                        <h5 class="mb40 gill">Are you sure you want to block user?</h5>
                        <a type="submit" id="blockSubmit" class="btn btn-primary max-WT-140">YES</a>
                        <button type="button" class="btn btn-primary max-WT-140" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="unblockModal" tabindex="-1" role="dialog">
        <div class="modal-dialog max-WT-450" role="document">
            <div class="modal-content text-center">
                <div class="modal-body custome-modla-body min-ht-300 d-flex align-items-center justify-content-center">
                                    <div class="w-100">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <img src="images/icon-logout.png" class="logOut-img" alt="">
                        <h5 class="mb40 gill">Are you sure you want to unblock user?</h5>
                        <a type="submit" id="unblockSubmit" class="btn btn-primary max-WT-140">YES</a>
                        <button type="button" class="btn btn-primary max-WT-140" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="signoutModal" tabindex="-1" role="dialog">
        <div class="modal-dialog max-WT-450" role="document">
            <div class="modal-content text-center">
                <div class="modal-body custome-modla-body min-ht-300 d-flex align-items-center justify-content-center">
                                    <div class="w-100">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <img src="images/icon-logout.png" class="logOut-img" alt="">
                        <h5 class="mb40 gill">Are you sure you want to sign out?</h5>
                        <a href="index.php" ><button type="submit" id="signmodalSubmit" class="btn btn-primary max-WT-140">YES</button></a>
                        <button type="button" class="btn btn-primary max-WT-140" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
  <!-- Control Sidebar -->
 <script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
  </script>
<!-- jQuery 3 -->
<script src="https://code.jquery.com/jquery-3.3.1.js"> </script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!--
<script>
  
/*$(document).ready( function () {
    $('#mytable').DataTable();
} );*/
function idd(id) {
  $("#modalSubmit").attr('href','delete.php?id='+id);
}

function blocke(id) {
  $("#blockSubmit").attr('href','block.php?id='+id);
}
function unblocke(id) {
  $("#unblockSubmit").attr('href','unblock.php?id='+id);
}
function sign() {
  $("#signmodalSubmit").attr('href','index.php?='+id);
}

</script>

