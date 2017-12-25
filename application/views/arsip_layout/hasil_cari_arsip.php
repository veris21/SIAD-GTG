<ul class="timeline timeline-inverse">
<?php 
//foreach($hasil_cari->result() as $h){
?> 
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-red">
                         <?php //echo mdate("%d %m %Y", $h->time);?>
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i><?php// echo mdate("%H:%i %A", $h->time);?></span>
                          <h3 class="timeline-header"><a href="#"><?php //echo $h->pengirim;?></a>(pengirim)</h3>
                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs">Read more</a>
                            <a class="btn btn-danger btn-xs">Delete</a>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
<?php 
//}
?>
</ul>