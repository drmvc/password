<?php

namespace DrMVC\Password;

/**
 * Class Password
 * @package DrMVC\Password
 */
class Password implements PasswordInterface
{

    /**
     * Hash the password using the specified algorithm
     *
     * @param   string $password The password to hash
     * @param   int $algorithm The algorithm to use (Defined by PASSWORD_* constants)
     * @param   array $options The options for the algorithm to use
     * @return  string|bool
     */
    public function make(string $password, int $algorithm = PASSWORD_DEFAULT, array $options = [])
    {
        return password_hash($password, $algorithm, $options);
    }

    /**
     * Get information about the password hash. Returns an array of the information
     * that was used to generate the password hash.
     *
     * @param   string $hash
     * @return  array
     */
    public function info(string $hash): array
    {
        return password_get_info($hash);
    }

    /**
     * Determine if the password hash needs to be rehashed according to the options provided.
     * If the answer is true, after validating the password using password_verify, rehash it.
     *
     * @param   string $hash The hash to test
     * @param   int $alg The algorithm used for new password hashes
     * @param   array $options The options array passed to password_hash
     * @return  bool
     */
    public function rehash($hash, $alg = PASSWORD_DEFAULT, array $options = []): bool
    {
        return password_needs_rehash($hash, $alg, $options);
    }

    /**
     * Verify a password against a hash using a timing attack resistant approach
     *
     * @param   string $password The password to verify
     * @param   string $hash The hash to verify against
     * @return  bool
     */
    public function verify($password, $hash): bool
    {
        return password_verify($password, $hash);
    }

}
