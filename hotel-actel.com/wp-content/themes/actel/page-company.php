<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package actel
 */

get_header();
?>

<div class="con_company">
	<div class="con_inner">
		<h2><img src="<?php bloginfo( 'template_url' ); ?>/images/common/st_company.svg" alt="COMPANY" width="224"></h2>

		<table class="tbl_basic02">
			<tr>
				<th>会社名</th>
				<td>株式会社大和エンタープライズ</td>
			</tr>
			<tr>
				<th>所在地</th>
				<td>愛知県名古屋市中区錦三丁目１７番２６号</td>
			</tr>
			<tr>
				<th>設立</th>
				<td>2016年（平成28）9月16日</td>
			</tr>
			<tr>
				<th>資本金</th>
				<td>300万円</td>
			</tr>
			<tr>
				<th>代表者</th>
				<td>代表取締役　石原　慎二</td>
			</tr>
			<tr>
				<th>従業員数</th>
				<td>10名</td>
			</tr>
			<tr>
				<th>事業内容</th>
				<td>
					ホテル、旅館の経営<br>
					温浴施設の経営<br>
					不動産管理及び賃貸業務<br>
					飲食店の経営<br>
					経営コンサルティング業務<br>
					労働者派遣事業<br>
					前各号に付帯する一切の業務
				</td>
			</tr>
		</table>
	</div>
</div>

<?php
get_footer();
