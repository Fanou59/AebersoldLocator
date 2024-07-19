import cors from "@fastify/cors"

const fastify = require('fastify')()

// Configuration de la base de données
fastify.register(require('@fastify/postgres'), {
    connectionString: 'postgres://user:password@localhost:5432/mydatabase'
  })

// Définir une route simple
fastify.get('/', async (request, reply) => {
  return { hello: 'Stéphane' };
});

// Requête de test 
fastify.get('/titre/:id', function (req,reply){
    const { id } = req.params;

    fastify.pg.query(
        `Select titre, volume, vehicle, akey, tempo, chorus, disc, track FROM mydatabase.aebersold WHERE id=$1`, [id],
        function onResult (err, result){
            const {titre, volume, vehicle, akey, tempo, chorus, disc, track} = result.rows[0]
            reply.send({titre, volume, vehicle, akey, tempo, chorus, disc, track})
        }
    )
})

// Démarrer le serveur
fastify.listen({ port: 3000 }, err => {
    if (err) throw err
    console.log(`server listening on ${fastify.server.address().port}`)
  })
