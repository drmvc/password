<?php

namespace DrMVC\Password;

/**
 * Interface PasswordInterface
 * @package DrMVC\Password
 */
interface PasswordInterface
{
    /**
     * Hash the password using the specified algorithm
     *
     * @param   string $password The password to hash
     * @param   int $algorithm The algorithm to use (Defined by PASSWORD_* constants)
     * @param   array $options The options for the algorithm to use
     * @return  mixed
     */
    public function make(string $password, int $algorithm, array $options = []);

    /**
     * Get information about the password hash. Returns an array of the information
     * that was used to generate the password hash.
     *
     * @param   string $hash
     * @return  array
     */
    public function getInfo(string $hash): array;

    /**
     * Determine if the password hash needs to be rehashed according to the options provided.
     * If the answer is true, after validating the password using password_verify, rehash it.
     *
     * @param   string $hash The hash to test
     * @param   int $algo The algorithm used for new password hashes
     * @param   array $options The options array passed to password_hash
     * @return  bool
     */
    public function needsRehash($hash, $algo = PASSWORD_DEFAULT, array $options = []): bool;

    /**
     * Verify a password against a hash using a timing attack resistant approach
     *
     * @param   string $password The password to verify
     * @param   string $hash The hash to verify against
     * @return  bool
     */
    public function verify($password, $hash): bool;
}
