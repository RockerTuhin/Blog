<?php

namespace Illuminate\Foundation\Auth;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        //return property_exists($this, 'redirectTo') ? $this->redirectTo : '';//Eta nicher comment er moto chilo ami change kore ebabe likhsi for working correctly.Omanobik kaj korlo,pore dekhi abar change na korleo kaj kore.Ejonno etai commentout kore rakhsi,kiektaobostha.


        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
