[{$smarty.block.parent}]
[{oxifcontent ident="announcements" object="oCont"}]
[{assign var="oConf" value=$oViewConf->getConfig()}]
[{assign var="homePop" value=$oConf->getConfigParam('homePop')}]
[{assign var="showPop" value=true}]

[{if $homePop && $oView->getClassName() ne "start"}]
  [{assign var="showPop" value=false}]
[{/if}]

[{if $showPop}]
  [{assign var="openPop" value=$oConf->getConfigParam('openPop')}]
  [{assign var="closePop" value=$oConf->getConfigParam('closePop')}]
  [{math assign="closePop" equation="x + y" x=$openPop y=$closePop}]
  [{oxscript include=$oViewConf->getModuleUrl('announcements','out/src/js/cookieWidget.js') priority=10}]
  [{oxscript include="js/libs/jquery.cookie.min.js"}]

  [{capture assign="checkCookie" name="checkCookie"}]
    var cookie = $.cookie('showAnnouncement');
    if (!cookie) {
    setTimeout(function(){
    $('#announcement').modal('show');
    }, [{$openPop}]);
    setTimeout(function(){
    $('#announcement').modal('hide');
  }, [{$closePop}]);
    }
  [{/capture}]
  [{oxscript add=$checkCookie}]

  <!-- OD Flow-Modal -->
  <div id="announcement" class="modal fade" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
          <!-- OD Flow-Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">&times;</span>
                      <span class="sr-only">[{oxmultilang ident="CLOSE"}]</span>
                  </button>
                  <h4 class="modal-title">[{$oCont->oxcontents__oxtitle->value}]</h4>
              </div>
              <div class="modal-body">
                  <p>[{$oCont->oxcontents__oxcontent->value}]</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">[{oxmultilang ident="CLOSE"}]</button>
              </div>
          </div>
      </div>
  </div>
[{/if}]
[{/oxifcontent}]
