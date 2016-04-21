<?php use_helper('Javascript')?>
<?php if ($private == 'true' && $sf_user->getLogin() != $subscriber->getUserLogin() ):?>
	<?php echo "Sorry this is Meal planner is private" ?>
<?php else:?>	
 <div id='cal'>
 <h3><?php echo $subscriber->getUserLogin(). '\'s'. ' Meal Planner'?></h3>
  <div id="cal_next">
		<?php echo link_to_remote('Next Month', array(
			'url' => 'planner/index?date='.$date.'&login='.$sf_user->getAttribute('login', '', 'subscriber'),
			'update' => 'cal'
	    	)); ?>
  </div>
  <div id="cal_prev">
   	<?php echo link_to_remote('Previous Month', array(
		'url' => 'planner/index?date='.$date.'&prev=prev'.'&login='.$sf_user->getAttribute('login', '', 'subscriber'),
		'update' => 'cal'
		))?>
   </div>
  
   <table class="calendar">
	 <caption><?php echo $month . ' ' . $year?></caption>
	<thead>
	   <tr>
		  <th>Mon</th>
		  <th>Tue</th>
		  <th>Wed</th>
		  <th>Thu</th>
		  <th>Fri</th>
		  <th>Sat</th>
		  <th>Sun</th>
	   </tr>
	</thead>
    <tbody>
	 <?php foreach ($cal as $week):?>
	    <tr>
	      <?php foreach ($week as $day => $events):?>
      	     <?php echo ($day == date('Y-m-d')) ? '<td class="today" valign="top">' : '<td valign="top">' ;?>
	         <div class="date"> 
		       <?php echo date('d', strtotime($day)) ?>
		     </div> 
            <?php if (!empty($events)):?>
               <?php foreach ($events as $event): ?>
                  <p><?php echo link_to_if(isset($event['url']), $event['title'], $event['url'], array('title' => $event['title'])); ?>
		           <?php echo link_to_remote('[x]', array(
			             'url' => 'planner/Remove?plannerid='.$event['plannerid'],
			             'confirm'  => 'Are you sure?', 
			             'complete' => 'location.reload(true)'
			          ))?></p>
			   <?php endforeach;?>
			  <?php endif;?>
			</td>
		   <?php endforeach;?>
		 </tr>
	   <?php endforeach;?>
	</tbody>
  </table>
    <?php if ($sf_user->getLogin() == $subscriber->getUserLogin()):?>
      <?php echo checkbox_tag('private', 1, $subscriber->getPlannerPrivate(), array('onclick'=> remote_function(array('with'=> "'private=' + 
                                                                              \$F('private')", 'url' => '@mark_private')
                                                                                )))?> Mark Private
   <?php endif?>
			
</div>
<?endif?>