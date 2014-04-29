{{if $app.navi.current > 1}}<a href="{{$url|cat:"&p=1"|cat:$parm|cnvgw}}">&lt;&lt;</a>&nbsp;&nbsp;{{/if}}{{*
*}}{{if $app.navi.prev}}&nbsp;<a href="{{$url|cat:"&p="|cat:$app.navi.prev|cat:$parm|cnvgw}}" accesskey="*"><span style="font-size:x-small;">Trước &lt;</span></a>&nbsp;{{/if}}{{*
*}}{{if $app.navi.totalPage > 1}}{{*
*}}{{foreach from=$app.navi.pages item=page}}{{*
*}}{{if $page <> $app.navi.current}}<a href="{{$url|cat:"&p="|cat:$page|cat:$parm|cnvgw}}">{{$page}}</a>{{else}}{{$page}}{{/if}}&nbsp;{{*
*}}{{/foreach}}{{*
*}}{{/if}}{{*
*}}{{if $app.navi.next}}&nbsp;<a href="{{$url|cat:"&p="|cat:$app.navi.next|cat:$parm|cnvgw}}" accesskey="#"><span style="font-size:x-small;">&gt; Sau</span></a>&nbsp;{{/if}}{{*
*}}{{if $app.navi.totalPage > $app.navi.current}}&nbsp;<a href="{{$url|cat:"&p="|cat:$app.navi.totalPage|cat:$parm|cnvgw}}">&gt;&gt;</a>{{/if}}
