<?php
class Controller_HelloWorld extends Controller_Template
{

	public function action_index()
	{
		$data['HelloWorlds'] = Model_HelloWorld::find('all');
		$this->template->title = "HelloWorlds";
		$this->template->content = View::forge('helloworld/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('helloworld');

		if ( ! $data['HelloWorld'] = Model_HelloWorld::find($id))
		{
			Session::set_flash('error', 'Could not find HelloWorld #'.$id);
			Response::redirect('helloworld');
		}

		$this->template->title = "HelloWorld";
		$this->template->content = View::forge('helloworld/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_HelloWorld::validate('create');

			if ($val->run())
			{
				$HelloWorld = Model_HelloWorld::forge(array(
				));

				if ($HelloWorld and $HelloWorld->save())
				{
					Session::set_flash('success', 'Added HelloWorld #'.$HelloWorld->id.'.');

					Response::redirect('helloworld');
				}

				else
				{
					Session::set_flash('error', 'Could not save HelloWorld.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Helloworlds";
		$this->template->content = View::forge('helloworld/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('helloworld');

		if ( ! $HelloWorld = Model_HelloWorld::find($id))
		{
			Session::set_flash('error', 'Could not find HelloWorld #'.$id);
			Response::redirect('helloworld');
		}

		$val = Model_HelloWorld::validate('edit');

		if ($val->run())
		{

			if ($HelloWorld->save())
			{
				Session::set_flash('success', 'Updated HelloWorld #' . $id);

				Response::redirect('helloworld');
			}

			else
			{
				Session::set_flash('error', 'Could not update HelloWorld #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('HelloWorld', $HelloWorld, false);
		}

		$this->template->title = "HelloWorlds";
		$this->template->content = View::forge('helloworld/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('helloworld');

		if ($HelloWorld = Model_HelloWorld::find($id))
		{
			$HelloWorld->delete();

			Session::set_flash('success', 'Deleted HelloWorld #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete HelloWorld #'.$id);
		}

		Response::redirect('helloworld');

	}

}
