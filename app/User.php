<?php

	namespace App;

	use Illuminate\Contracts\Auth\MustVerifyEmail;
	use Illuminate\Foundation\Auth\User as Authenticatable;
	use Illuminate\Notifications\Notifiable;
	use Lab404\Impersonate\Models\Impersonate;
	use Laravel\Passport\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;

	class User extends Authenticatable
	{
		use HasApiTokens, Notifiable, HasRoles, Impersonate;

		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $guarded = [];
		/**
		 * The attributes that should be hidden for arrays.
		 *
		 * @var array
		 */
		protected $hidden = [
			'password',
			'remember_token',
		];
		/**
		 * The attributes that should be cast to native types.
		 *
		 * @var array
		 */
		protected $casts = [
			'email_verified_at' => 'datetime',
		];

		public function scopeSearchParent($query, $field, $string) {
			return $string ? $query->whereHas('parents', function ($q) use ($field, $string) {
				$q->whereHas('user_data', function ($u) use ($field, $string) {
					$u->where($field, 'like', '%' . $string . '%');
				});
			}) : $query;
		}

		public function scopeWithAssociated($query) {
			return $query->whereHas('user_data', function ($q) {
				$q->where('created_by', auth()->user()->id);
			})->OrwhereHas('parents', function ($q) {
				$q->where('parent_id', auth()->user()->id);
			});
		}

		public function getNameAttribute() {
			return $this->user_data->name;
		}

		public function getCreatedByAttribute() {
			$user = User::find($this->user_data->created_by);
			return $user;
		}

		public function isAdmin() {
			return $this->hasRole('admin');
		}

		public function getRoleAttribute() {
			return $this->roles[0];
		}

		public function user_data() {
			return $this->hasOne(UserData::class);
		}

		public function folders() {
			return $this->hasMany(Folder::class);
		}

		public function applicant() {
			return $this->hasMany(Applicant::class);
		}

		public function anagrafiche() {
			return $this->hasMany(Anagrafica::class);
		}

		public function parents() {
			return $this->belongsToMany(User::class, 'childs_parents', 'child_id', 'parent_id');
		}

		public function childs() {
			return $this->belongsToMany(User::class, 'childs_parents', 'parent_id', 'child_id');
		}

		public function contractual_documents() {
			return $this->hasMany(ContractualDocument::class);
		}
	}
