function highlight_stars(id, note, do_highlight)
{
  for (var i = 1 ; i <= note ; i++)
  {
    if(do_highlight)
      Element.addClassName($('rate_'+id+'_'+i), 'ratehover');
    else
      Element.removeClassName($('rate_'+id+'_'+i), 'ratehover');
  }
}          