<?php

function is_logged_in()
{
	$desacangkuang = get_instance();
	if (!$desacangkuang->session->userdata('email')) {
		redirect('auth');
	} else {
		$role_id = $desacangkuang->session->userdata('role_id');
		$menu = $desacangkuang->uri->segment(1);

		$queryMenu = $desacangkuang->db->get_where('user_menu', ['menu' => $menu])->row_array();
		$menu_id = $queryMenu['id'];

		$userAccess = $desacangkuang->db->get_where(
			'user_access_menu',
			[
				'role_id'  => $role_id,
				'menu_id' => $menu_id
			]
		);

		if ($userAccess->num_rows() < 1) {
			redirect('auth/blokir');
		}
	}
}
