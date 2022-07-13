<?php

	use Illuminate\Database\Seeder;
	use Spatie\Permission\Models\Permission;
	use Spatie\Permission\Models\Role;

	class RolesPermissionsSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run() {
			// ROLES
			$admin = Role::create([
				'name'  => 'admin',
				'label' => 'Amministratore'
			]);
			$financial = Role::create([
				'name'  => 'financial',
				'label' => 'Società Finanziaria'
			]);
			$bank = Role::create([
				'name'  => 'bank',
				'label' => 'Banca'
			]);
			$business = Role::create([
				'name'  => 'business',
				'label' => 'Impresa'
			]);
			$collaborator = Role::create([
				'name'  => 'collaborator',
				'label' => 'Collaboratore'
			]);
			$consultant = Role::create([
				'name'  => 'consultant',
				'label' => 'Consulente'
			]);
			$technical_asseverator = Role::create([
				'name'  => 'technical_asseverator',
				'label' => 'Asseveratore Tecnico'
			]);
			$fiscal_asseverator = Role::create([
				'name'  => 'fiscal_asseverator',
				'label' => 'Asseveratore Fiscale'
			]);
			$manager = Role::create([
				'name'  => 'manager',
				'label' => 'Manager'
			]);
			//        $provider = Role::create(['name' => 'provider']);
			//        $lv1_agent = Role::create(['name' => 'lv1_agent']);
			//        $lv2_agent = Role::create(['name' => 'lv2_agent']);
			//        $condomimium = Role::create(['name' => 'condomimium']);
			// PERMISSIONS
			$permissions = [
				/* Anagrafiche */
				'access_anagrafiche',
				'create_anagrafiche',
				'read_anagrafiche',
				'update_anagrafiche',
				'delete_anagrafiche',
				/* Users */
				'access_users',
				'create_users',
				'update_users',
				'delete_users',
				/* Practices */
				'access_practices',
				'create_practices',
				'read_practices',
				'update_practices',
				'delete_practices',
				/* Practices - Computo */
				'create_computo',
				'download_computo',
				/* Practices - Tabs */
				// Applicant
				// Practice
				// Subject
				// Building
				'create_condomini',
				'import_condomini_excel',
				'export_condomini_excel',
				'download_condomini_excel',
				'delete_condomini_excel',
				// Media
				// Documents
				'view_required_documents_folder',
				'upload_required_documents_file',
				'download_required_documents_file',
				'delete_required_documents_file',
				'approve_required_documents_folder',
				'disapprove_required_documents_folder',
				// Superbonus
				// Contracts
				'upload_contracts',
				'download_contracts',
				'delete_contracts',
				// Policies
				'upload_policies',
				'download_policies',
				'delete_policies',
				/* Files/Folders Management (FOLDERS) */
				'access_folders',
				'create_folders',
				'read_folders',
				'update_folders',
				'delete_folders',
				/* Files/Folders Management (FILES) */
				'upload_folder_files',
				'download_folder_files',
				'delete_folder_files',
				/* Contractual Documents */
				'access_contractual_documents',
				'upload_contractual_documents',
				'download_contractual_documents',
				'delete_contractual_documents',
				/* Price Lists */
				'access_price_lists',
				'create_price_lists',
				'upload_price_lists',
				'delete_price_lists',
			];
			foreach ($permissions as $permission) {
				Permission::create([
					'name' => $permission
				]);
			}
			// Business base permissions
			$business->givePermissionTo([
				// Anagrafiche
				'access_anagrafiche',
				'create_anagrafiche',
				'read_anagrafiche',
				'update_anagrafiche',
				'delete_anagrafiche',
				// Users
				'access_users',
				'create_users',
				'update_users',
				'delete_users',
				// Practices
				'access_practices',
				'create_practices',
				'read_practices',
				'update_practices',
				'delete_practices',
				// Condomini
				'create_condomini',
				//// Excel
				'import_condomini_excel',
				'export_condomini_excel',
				'download_condomini_excel',
				'delete_condomini_excel',
				// Required Documents
				'view_required_documents_folder',
				'upload_required_documents_file',
				'download_required_documents_file',
				'delete_required_documents_file',
				// Computo
				'create_computo',
				'download_computo',
				// Contracts
				'upload_contracts',
				'download_contracts',
				'delete_contracts',
				// Policies
				'upload_policies',
				'download_policies',
				'delete_policies',
				// Files/Folders Management (FOLDERS)
				'access_folders',
				'create_folders',
				'read_folders',
				'update_folders',
				'delete_folders',
				// Files/Folders Management (FILES)
				'upload_folder_files',
				'download_folder_files',
				'delete_folder_files',
				// Contractual Documents
				'access_contractual_documents',
				'upload_contractual_documents',
				'download_contractual_documents',
				'delete_contractual_documents',
				// Price Lists
				'access_price_lists',
				'create_price_lists',
				'upload_price_lists',
				'delete_price_lists',
			]);
			// Collaborator base permissions
			$collaborator->givePermissionTo([
				// Anagrafiche
				'access_anagrafiche',
				// Practices
				'access_practices',
				'create_practices',
				'read_practices',
				'update_practices',
				'delete_practices',
				// Required Documents
				'view_required_documents_folder',
				'upload_required_documents_file',
				'download_required_documents_file',
				'delete_required_documents_file',
				// Computo
				'create_computo',
				'download_computo',
				// Contracts
				'upload_contracts',
				'download_contracts',
				'delete_contracts',
				// Policies
				'upload_policies',
				'download_policies',
				'delete_policies',
				// Files/Folders Management (FOLDERS)
				'access_folders',
				'create_folders',
				'read_folders',
				'update_folders',
				'delete_folders',
				// Files/Folders Management (FILES)
				'upload_folder_files',
				'download_folder_files',
				'delete_folder_files',
				// Contractual Documents
				'access_contractual_documents',
				'upload_contractual_documents',
				'download_contractual_documents',
				'delete_contractual_documents',
				// Price Lists
				'access_price_lists',
				'create_price_lists',
				'upload_price_lists',
				'delete_price_lists',
			]);
			// Bank base permissions
			$bank->givePermissionTo([
				// Anagrafiche
				'access_anagrafiche',
				// Users
				'access_users',
				// Practices
				'access_practices',
				'access_folders',
				// Contractual Documents
				'access_contractual_documents',
				'download_contractual_documents',
			]);
			// Technical Asseverator base permissions
			$technical_asseverator->givePermissionTo([
				// Anagrafiche
				'access_anagrafiche',
				// Practices
				'access_practices',
				'read_practices',
				// Required Documents
				'view_required_documents_folder',
				'download_required_documents_file',
				'approve_required_documents_folder',
				'disapprove_required_documents_folder',
				// Folders
				'access_folders',
				// Contractual Documents
				'access_contractual_documents',
				'download_contractual_documents',
			]);
			// Fiscal Asseverator base permissions
			$fiscal_asseverator->givePermissionTo([
				// Anagrafiche
				'access_anagrafiche',
				// Practices
				'access_practices',
				'read_practices',
				// Required Documents
				'view_required_documents_folder',
				'download_required_documents_file',
				'approve_required_documents_folder',
				'disapprove_required_documents_folder',
				// Folders
				'access_folders',
				// Contractual Documents
				'access_contractual_documents',
				'download_contractual_documents',
			]);
		}
	}
