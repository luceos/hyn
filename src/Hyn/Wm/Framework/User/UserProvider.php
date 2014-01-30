<?PHP
namespace Hyn\Wm\Framework\User;

use Illuminate\Auth\UserProviderInterface;
use Illuminate\Auth\GenericUser;

class UserProvider implements UserProviderInterface
{
	
	public function __construct(  )
	{
	}
	public function retrieveByID( $identifier )
	{
		return Base::ByUserID( $identifier );
	}
	public function retrieveByCredentials( array $credentials )
	{
		return Base::ByUserID( $credentials['username'] );
	}
	public function validateCredentials( \Illuminate\Auth\UserInterface $user, array $credentials )
	{
		// user disabled
		if( !empty( $user -> deleted_at ))
			return false;
		return $user -> validateCredentials( $credentials['username'] , $credentials['password'] );
	}
}
