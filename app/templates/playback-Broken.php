<div class="tab-content">
  <!-- Did this work? Can I mess with this? -->
  <!-- PLAYBACK PANEL -->
  <div id="playback" class="tab-pane active">
    <flex>
      <cover class="topMatter relative col-sm-6">
        <?php if ($this->coverart == 1): ?>
        <art class="coverart" >
            <img id="cover-art" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="transparent-square">
        </art>
        <?php endif ?>

        <info class="trackInfo absolute">
          <ul class="list list-reset">
            <li class="artist">
              <h2 id="currentartist" class="artist">
                <span class="bg-darkgray yellow p0p25"><i class="fa fa-spinner fa-]spin"></i></span>
              </h2>
            </li>
            <li class="songTitle">
              <h1 id="currentsong" class="songTitle">
                <span class="bg-darkgray yellow p0p25"><i class="fa fa-spinner fa-spin"></i></span>
              </h1>
            </li>
            <li class="albumTitle">
              <h2 id="currentalbum" class="albumTitle">
                <span class="bg-darkgray yellow p0p25"><i class="fa fa-spinner fa-spin"></i></span>
              </h2>
            </li>
            <li class="meta">
              <p id="format-bitrate" class="meta">
                <span class="bg-darkgray yellow p0p25 mono"><i class="fa fa-spinner fa-spin"></i></span>
              </p>
            </li>
          </ul>
        </info>
      </cover>
      <panel>
        <div class="controlPanel">
          <div class="controls playback-controls btn-group">
            <button id="previous" class="btn btn-default btn-cmd" title="Previous" data-cmd="previous"><i class="fa fa-step-backward"></i></button>
            <button id="stop" class="btn btn-default btn-cmd" title="Stop" data-cmd="stop"><i class="fa fa-stop"></i></button>
            <button id="play" class="btn btn-default btn-cmd" title="Play/Pause" data-cmd="play"><i class="fa fa-play"></i></button>
            <button id="next" class="btn btn-default btn-cmd" title="Next" data-cmd="next"><i class="fa fa-step-forward"></i></button>
          </div>
          <div class="controls miscellany btn-group">
            <button id="random" class="btn btn-default btn-lg btn-cmd btn-toggle" type="button" title="Random" data-cmd="random"><i class="fa fa-random"></i></button>
            <button id="repeat" class="btn btn-default btn-lg btn-cmd btn-toggle" type="button" title="Repeat" data-cmd="repeat"><i class="fa fa-repeat"></i></button>
            <button id="single" class="btn btn-default btn-lg btn-cmd btn-toggle <?php if ($this->activePlayer === 'Spotify'): ?>disabled<?php endif; ?>" type="button" title="Single" data-cmd="single"><i class="fa fa-refresh"></i></button>
          </div>
          <div class="controls volume btn-group">
            <button id="volumedn" class="btn btn-default btn-lg btn-cmd btn-volume" type="button" <?php if (isset($this->volume['disabled'])): ?> disabled="disabled" <?php endif ?> title="Volume down" data-cmd="volumedn"><i class="fa fa-volume-down"></i></button>
            <button id="volumemute" class="btn btn-default btn-lg btn-cmd btn-volume" type="button" <?php if (isset($this->volume['disabled'])): ?> disabled="disabled" <?php endif ?> title="Volume mute/unmute" data-cmd="volumemute"><i class="fa fa-volume-off"></i> <i class="fa fa-exclamation"></i></button>
            <button id="volumeup" class="btn btn-default btn-lg btn-cmd btn-volume" type="button" <?php if (isset($this->volume['disabled'])): ?> disabled="disabled" <?php endif ?> title="Volume up" data-cmd="volumeup"><i class="fa fa-volume-up"></i></button>
          </div>
        </div>
        <queue>
          <div class="btnlist btnlist-top">
            <form id="pl-search" class="form-inline" method="post" onSubmit="return false;" role="form">
                <div class="input-group">
                    <input id="pl-filter" class="form-control osk-trigger ttip" type="text" value="" placeholder="search in queue..." data-placement="bottom" data-toggle="tooltip" data-original-title="Type here to search on the fly">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" title="Search"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <button id="pl-filter-results" class="btn hide" type="button" title="Close filter results and go back to the playing Queue"><i class="fa fa-times sx"></i> back</button>
            <span id="pl-count" class="hide">2143 entries</span>
          </div>
          <div id="playlist">
            <ul id="playlist-entries" class="playlist">
                <!-- playing queue entries -->
            </ul>
            <ul id="pl-editor" class="playlist hide">
                <!-- playlists -->
            </ul>
            <ul id="pl-detail" class="playlist hide">
                <!-- playlist entries -->
            </ul>
            <div id="playlist-warning" class="playlist hide">
                <div class="col-sm-12">
                    <h1 class="txtmid">Playing queue</h1>
                </div>
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="empty-block">
                        <i class="fa fa-exclamation"></i>
                        <h3>Empty queue</h3>
                        <p>Add some entries from your library</p>
                        <p><a id="open-library" href="#panel-sx" class="btn btn-primary btn-lg" data-toggle="tab">Browse Library</a></p>
                    </div>
                </div>
            </div>
          </div>
          <div class="btnlist btnlist-bottom">
              <div id="pl-controls">
                  <button id="pl-firstPage" class="btn btn-default" type="button" title="Scroll to the top"><i class="fa fa-angle-double-up"></i></button>
                  <button id="pl-prevPage" class="btn btn-default" type="button" title="Scroll one page up"><i class="fa fa-angle-up"></i></button>
                  <button id="pl-nextPage" class="btn btn-default" type="button" title="Scroll one page down"><i class="fa fa-angle-down"></i></button>
                  <button id="pl-lastPage" class="btn btn-default" type="button" title="Scroll to the bottom"><i class="fa fa-angle-double-down"></i></button>
              </div>
              <div id="pl-manage">
                  <button id="pl-manage-list" class="btn btn-default" type="button" title="Manage playlists"><i class="fa fa-file-text-o"></i></button>
                  <button id="pl-manage-save" class="btn btn-default" type="button" title="Save current queue as playlist" data-toggle="modal" data-target="#modal-pl-save"><i class="fa fa-save"></i></button>
                  <button id="pl-manage-clear" class="btn btn-default" type="button" title="Clear the playing queue" data-toggle="modal" data-target="#modal-pl-clear"><i class="fa fa-trash-o"></i></button>
              </div>
              <div id="pl-currentpath" class="hide">
                  <i class="fa fa-folder-open"></i>
                  <span>Playlists</span>
              </div>
          </div>
        </queue>
      </panel>
    </flex>
    
    <div class="container-fluid hideForNow" id="secondaryDrawer">
        <div class="knobs row">
            <div id="time-knob" class="col-sm-4 col-sm-offset-2">
                <input id="time" value="0" data-width="230" data-height="230" data-bgColor="#34495E" data-fgcolor="#0095D8" data-thickness="0.30" data-min="0" data-max="1000" data-displayInput="false" data-displayPrevious="true">
                <span id="countdown-display"><i class="fa fa-spinner fa-spin"></i></span>
                <span id="total"><i class="fa fa-spinner fa-spin"></i></span>
                <div class="btn-group">
                    <button id="repeat" class="btn btn-default btn-lg btn-cmd btn-toggle" type="button" title="Repeat" data-cmd="repeat"><i class="fa fa-repeat"></i></button>
                    <button id="random" class="btn btn-default btn-lg btn-cmd btn-toggle" type="button" title="Random" data-cmd="random"><i class="fa fa-random"></i></button>
                    <button id="single" class="btn btn-default btn-lg btn-cmd btn-toggle <?php if ($this->activePlayer === 'Spotify'): ?>disabled<?php endif; ?>" type="button" title="Single" data-cmd="single"><i class="fa fa-refresh"></i></button>
                    <!--<button type="button" id="consume" class="btn btn-default btn-lg btn-cmd btn-toggle" title="Consume Mode" data-cmd="consume"><i class="fa fa-compress"></i></button>-->
                </div>
            </div>
            <div id="volume-knob" class="col-sm-4 <?=$this->volume['divclass'] ?>">
                <input id="volume" value="100" data-width="230" data-height="230" data-bgColor="#f00" data-thickness=".25" data-skin="tron" data-cursor="true" data-angleArc="250" data-angleOffset="-125" data-readOnly="<?=$this->volume['readonly'] ?>" data-fgColor="<?=$this->volume['color'] ?>" data-dynamic="<?=$this->volume['dynamic'] ?>" <?php if (isset($this->volume['disabled'])): ?> disabled="disabled"
                <?php endif ?>>
                <div class="btn-group">
                    <button id="volumedn" class="btn btn-default btn-lg btn-cmd btn-volume" type="button" <?php if (isset($this->volume['disabled'])): ?> disabled="disabled" <?php endif ?> title="Volume down" data-cmd="volumedn"><i class="fa fa-volume-down"></i></button>
                    <button id="volumemute" class="btn btn-default btn-lg btn-cmd btn-volume" type="button" <?php if (isset($this->volume['disabled'])): ?> disabled="disabled" <?php endif ?> title="Volume mute/unmute" data-cmd="volumemute"><i class="fa fa-volume-off"></i> <i class="fa fa-exclamation"></i></button>
                    <button id="volumeup" class="btn btn-default btn-lg btn-cmd btn-volume" type="button" <?php if (isset($this->volume['disabled'])): ?> disabled="disabled" <?php endif ?> title="Volume up" data-cmd="volumeup"><i class="fa fa-volume-up"></i></button>
                </div>
            </div>

            <span id="playlist-position"></span>

        </div>
    </div>
  </div>
  
    <!-- LIBRARY PANEL -->
    <div id="panel-sx" class="tab-pane">
        <div class="btnlist btnlist-top">
            <form id="db-search" class="form-inline" action="javascript:getDB({cmd: 'search', path: GUI.currentpath, browsemode: GUI.browsemode});">
                <div class="input-group">
                    <input id="db-search-keyword" class="form-control osk-trigger" type="text" value="" placeholder="search in DB...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" title="Search"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <button id="db-level-up" class="btn hide" type="button" title="Go back one level"><i class="fa fa-arrow-left sx"></i> back</button>
            <button id="db-search-results" class="btn hide" type="button" title="Close search results and go back to the Library browsing"><i class="fa fa-times sx"></i> back</button>
        </div>
        <div id="database">
            <ul id="database-entries" class="database">
                <!-- DB entries -->
            </ul>
            <div id="home-blocks" class="row">
                <div class="col-sm-12">
                    <h1 class="txtmid">Browse your library</h1>
                </div>
            </div>
        </div>
        <div class="btnlist btnlist-bottom">
            <div id="db-controls">
                <button id="db-homeSetup" class="btn btn-default hide" type="button" title="Setup the Library home screen"><i class="fa fa-gear"></i></button>
                <button id="db-firstPage" class="btn btn-default" type="button" title="Scroll to the top"><i class="fa fa-angle-double-up"></i></button>
                <button id="db-prevPage" class="btn btn-default" type="button" title="Scroll one page up"><i class="fa fa-angle-up"></i></button>
                <button id="db-nextPage" class="btn btn-default" type="button" title="Scroll one page down"><i class="fa fa-angle-down"></i></button>
                <button id="db-lastPage" class="btn btn-default" type="button" title="Scroll to the bottom"><i class="fa fa-angle-double-down"></i></button>
            </div>
            <div id="db-currentpath">
                <i class="fa fa-folder-open"></i> <span>Home</span>
            </div>
        </div>
        <div id="spinner-db" class="csspinner duo hide"></div>
    </div>
  
    <!-- QUEUE PANEL -->
<!--
    <div id="panel-dx" class="tab-pane">
      Deleted!
    </div>
-->
</div>

<div id="context-menus">
    <div id="context-menu" class="context-menu">
        <ul class="dropdown-menu" role="menu">
            <li><a href="javascript:;" data-cmd="add"><i class="fa fa-plus-circle sx"></i> Add</a></li>
            <li><a href="javascript:;" data-cmd="addplay"><i class="fa fa-play sx"></i> Add and play</a></li>
            <li><a href="javascript:;" data-cmd="addreplaceplay"><i class="fa fa-share-square-o sx"></i> Add, replace and play</a></li>
            <li><a href="javascript:;" data-cmd="update"><i class="fa fa-refresh sx"></i> Update this folder</a></li>
            <li><a href="javascript:;" data-cmd="bookmark"><i class="fa fa-star sx"></i> Save as bookmark</a></li>
        </ul>
    </div>
    <div id="context-menu-file" class="context-menu">
        <ul class="dropdown-menu" role="menu">
            <li><a href="javascript:;" data-cmd="add"><i class="fa fa-plus-circle sx"></i> Add</a></li>
            <li><a href="javascript:;" data-cmd="addplay"><i class="fa fa-play sx"></i> Add and play</a></li>
            <li><a href="javascript:;" data-cmd="addreplaceplay"><i class="fa fa-share-square-o sx"></i> Add, replace and play</a></li>
            <li><a href="javascript:;" data-cmd="lastfmaddreplaceplay"><i class="fa fa-lastfm sx"></i> Last.fm playlist from this</a></li>
        </ul>
    </div>
    <div id="context-menu-playlist" class="context-menu">
        <ul class="dropdown-menu" role="menu">
            <li><a href="javascript:;" data-cmd="pl-add"><i class="fa fa-plus-circle sx"></i> Add to queue</a></li>
            <li><a href="javascript:;" data-cmd="pl-replace"><i class="fa fa-undo sx"></i> Replace the queue</a></li>
            <li><a href="javascript:;" data-cmd="pl-rename"><i class="fa fa-edit sx"></i> Rename</a></li>
            <li><a href="javascript:;" data-cmd="pl-rm"><i class="fa fa-trash-o sx"></i> Delete</a></li>
        </ul>
    </div>
    <div id="context-menu-album" class="context-menu">
        <ul class="dropdown-menu" role="menu">
            <li><a href="javascript:;" data-cmd="albumadd"><i class="fa fa-plus-circle sx"></i> Add</a></li>
            <li><a href="javascript:;" data-cmd="albumaddplay"><i class="fa fa-play sx"></i> Add and play</a></li>
            <li><a href="javascript:;" data-cmd="albumaddreplaceplay"><i class="fa fa-share-square-o sx"></i> Add, replace and play</a></li>
        </ul>
    </div>
</div>

<div id="modal-pl-save" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-pl-save-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="modal-pl-save-label">Save current queue as playlist</h3>
            </div>
            <div class="modal-body">
                <label for="pl-save-name">Give a name to this playlist</label>
                <input id="pl-save-name" class="form-control osk-trigger" type="text" placeholder="Enter playlist name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
                <button type="button" id="modal-pl-save-btn" class="btn btn-primary btn-lg" data-dismiss="modal">Save playlist</button>
            </div>
        </div>
    </div>
</div>

<div id="modal-pl-clear" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-pl-clear-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="modal-pl-clear-label">Clear current queue</h3>
            </div>
            <div class="modal-body">
                This will clear the current playing queue.<br>
                Are you sure?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-lg btn-cmd" data-cmd="clear" data-dismiss="modal">Clear</button>
            </div>
        </div>
    </div>
</div>

<div id="modal-pl-rename" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-pl-rename-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="modal-pl-rename-label">Rename the playlist</h3>
            </div>
            <div class="modal-body">
                <label for="pl-rename-name">Rename "<strong id="pl-rename-oldname"></strong>" playlist to:</label>
                <input id="pl-rename-name" class="form-control" type="text" placeholder="Enter playlist name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
                <button id="pl-rename-button" type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Rename</button>
            </div>
        </div>
    </div>
</div>

<div id="overlay-playsource" class="overlay-scale closed">
    <nav>
        <ul>
            <li><span>Playback source</span></li>
			<li><a href="javascript:;" id="playsource-mpd" class="btn btn-default btn-lg btn-block" title="Switch to MPD"><i class="fa fa-linux sx"></i> MPD</a></li>
			<li><a href="javascript:;" id="playsource-spotify" class="btn btn-default btn-lg btn-block inactive" title="Switch to Spotify"><i class="fa fa-spotify sx"></i> <span>spop</span> Spotify</a></li>
			<li><a href="javascript:;" id="playsource-airplay" class="btn btn-default btn-lg btn-block inactive"><i class="fa fa-apple sx"></i> <span>ShairPort</span> Airplay</a></li>
			<li><a href="javascript:;" id="playsource-dlna" class="btn btn-default btn-lg btn-block inactive"><i class="fa fa-puzzle-piece sx"></i> <span>upmpdcli</span> DLNA</a></li>
            <li><button id="overlay-playsource-close" class="btn btn-link" type="button"><i class="fa fa-times"></i> close this layer</button></li>
        </ul>
    </nav>
</div>
