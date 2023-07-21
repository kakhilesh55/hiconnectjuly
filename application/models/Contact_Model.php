<?php
	class Contact_Model extends CI_Model{
		
		public function add_contact(){
            $data = ['email1' => $this->input->post('email1'),
              'email2' => $this->input->post('email2'),
              'email3' => $this->input->post('email3'),
              'user_id' => $this->session->userdata('id'),
              'phone1' => $this->input->post('phone1'),
              'phone2' => $this->input->post('phone2'),
              'phone3' => $this->input->post('phone3'),
              'address1' => $this->input->post('address1'),
              'address2' => $this->input->post('address2'),
              'city' => $this->input->post('city'),
              'state' => $this->input->post('state'),
              'zipcode' => $this->input->post('zipcode'),
              'country' => $this->input->post('country')
              ];
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

		public function get_contact_dt($user_id){
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('contact_details');
			doLog($this->db->last_query());
			return $query->result();
		}

		public function update_contact_details($id){
			$data = ['email1' => $this->input->post('email1'),
              'email2' => $this->input->post('email2'),
              'email3' => $this->input->post('email3'),
              'user_id' => $this->session->userdata('id'),
              'phone1' => $this->input->post('phone1'),
              'phone2' => $this->input->post('phone2'),
              'phone3' => $this->input->post('phone3'),
              'address1' => $this->input->post('address1'),
              'address2' => $this->input->post('address2'),
              'city' => $this->input->post('city'),
              'state' => $this->input->post('state'),
              'zipcode' => $this->input->post('zipcode'),
              'country' => $this->input->post('country')
              ];
			$this->db->where('contact_id', $id);
			$res = $this->db->update('contact_details', $data);
		}

	}