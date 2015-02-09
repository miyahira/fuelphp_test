<?php
class Controller_Name extends Controller_Template
{

	public function action_index()
	{
		$data['names'] = Model_Name::find('all');
		$this->template->title = "Names";
		$this->template->content = View::forge('name/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('name');

		if ( ! $data['name'] = Model_Name::find($id))
		{
			Session::set_flash('error', 'Could not find name #'.$id);
			Response::redirect('name');
		}

		$this->template->title = "Name";
		$this->template->content = View::forge('name/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Name::validate('create');

			if ($val->run())
			{
				$name = Model_Name::forge(array(
				));

				if ($name and $name->save())
				{
					Session::set_flash('success', 'Added name #'.$name->id.'.');

					Response::redirect('name');
				}

				else
				{
					Session::set_flash('error', 'Could not save name.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Names";
		$this->template->content = View::forge('name/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('name');

		if ( ! $name = Model_Name::find($id))
		{
			Session::set_flash('error', 'Could not find name #'.$id);
			Response::redirect('name');
		}

		$val = Model_Name::validate('edit');

		if ($val->run())
		{

			if ($name->save())
			{
				Session::set_flash('success', 'Updated name #' . $id);

				Response::redirect('name');
			}

			else
			{
				Session::set_flash('error', 'Could not update name #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('name', $name, false);
		}

		$this->template->title = "Names";
		$this->template->content = View::forge('name/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('name');

		if ($name = Model_Name::find($id))
		{
			$name->delete();

			Session::set_flash('success', 'Deleted name #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete name #'.$id);
		}

		Response::redirect('name');

	}

}
