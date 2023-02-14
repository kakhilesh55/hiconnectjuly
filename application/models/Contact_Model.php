<?php
	class Contact_Model extends CI_Model{
		
		public function add_contact(){
			$data = array('email' => $this->input->post('email'),
						  'user_id' => $this->session->userdata('id'),
						  'mob1' => $this->input->post('mob1'),
						  'mob2	' => $this->input->post('mob2'),
						  'mob3' => $this->input->post('mob3'),
						  'whatsapp1' => $this->input->post('whatsapp1'),
						  'whatsapp2	' => $this->input->post('whatsapp2'),
						  'whatsapp3' => $this->input->post('whatsapp3')
						  );
			$res=  $this->db->insert('contact_details', $data);
		}

		public function edit_contact($id){
			$this->db->where('contact_id', $id);
			$query = $this->db->get('contact_details');
			return $query->row();
		}

		public function get_contact_by_user($user_id){
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('contact_details');
			return $query->row();
		}

		public function update_contact_details($id){
			$data = array('email' => $this->input->post('email'),
						  'mob1' => $this->input->post('mob1'),
						  'mob2	' => $this->input->post('mob2'),
						  'mob3' => $this->input->post('mob3'),
						  'whatsapp1' => $this->input->post('whatsapp1'),
						  'whatsapp2	' => $this->input->post('whatsapp2'),
						  'whatsapp3' => $this->input->post('whatsapp3')
						  );
			$this->db->where('contact_id', $id);
			$res = $this->db->update('contact_details', $data);
		}

	}