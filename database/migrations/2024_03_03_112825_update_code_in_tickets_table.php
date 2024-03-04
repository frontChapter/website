<?php

use App\Models\Ticket;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $tickets = Ticket::whereIn('ticket_id', ['275714'])
                ->get();

            $codes = json_decode('[{"code":"4dw99rdf","amount":300000,"category":"SPONSORSHIP"},{"code":"07ebio3c","amount":300000,"category":"SPONSORSHIP"},{"code":"sbikeadn","amount":300000,"category":"SPONSORSHIP"},{"code":"ds0lqmz0","amount":300000,"category":"SPONSORSHIP"},{"code":"7ii7yg0u","amount":300000,"category":"SPONSORSHIP"},{"code":"ppopmu9a","amount":300000,"category":"SPONSORSHIP"},{"code":"hzcy7tp6","amount":300000,"category":"SPONSORSHIP"},{"code":"vb78azft","amount":300000,"category":"SPONSORSHIP"},{"code":"0w3gpbbo","amount":300000,"category":"SPONSORSHIP"},{"code":"liw81e5t","amount":300000,"category":"SPONSORSHIP"},{"code":"senz5au9","amount":300000,"category":"SPONSORSHIP"},{"code":"uxzfb1pj","amount":300000,"category":"SPONSORSHIP"},{"code":"p6q8gvq6","amount":300000,"category":"SPONSORSHIP"},{"code":"9k4gup9n","amount":300000,"category":"SPONSORSHIP"},{"code":"rytkh87i","amount":300000,"category":"SPONSORSHIP"},{"code":"iq4yv7vk","amount":300000,"category":"SPONSORSHIP"},{"code":"shyql9r5","amount":300000,"category":"SPONSORSHIP"},{"code":"vqx81kus","amount":300000,"category":"SPONSORSHIP"},{"code":"hlxo19sx","amount":300000,"category":"SPONSORSHIP"},{"code":"qh7fvh71","amount":300000,"category":"SPONSORSHIP"},{"code":"fsqqcsgv","amount":300000,"category":"SPONSORSHIP"},{"code":"4pa8t5ni","amount":300000,"category":"SPONSORSHIP"},{"code":"7d3yjkuy","amount":300000,"category":"SPONSORSHIP"},{"code":"wspc2ney","amount":300000,"category":"SPONSORSHIP"},{"code":"54zryzlk","amount":300000,"category":"SPONSORSHIP"},{"code":"myk8wqi5","amount":300000,"category":"SPONSORSHIP"},{"code":"hsxuo7sy","amount":300000,"category":"SPONSORSHIP"},{"code":"s22ncron","amount":300000,"category":"SPONSORSHIP"},{"code":"fpoho4t7","amount":300000,"category":"SPONSORSHIP"},{"code":"z8w1fppo","amount":300000,"category":"SPONSORSHIP"},{"code":"1gouadri","amount":300000,"category":"SPONSORSHIP"},{"code":"znilx8u7","amount":300000,"category":"SPONSORSHIP"},{"code":"u0sx7t7u","amount":300000,"category":"SPONSORSHIP"},{"code":"6eweqhhp","amount":300000,"category":"SPONSORSHIP"},{"code":"yrqan4md","amount":300000,"category":"SPONSORSHIP"},{"code":"10w00nqq","amount":300000,"category":"SPONSORSHIP"},{"code":"n4bebzip","amount":300000,"category":"SPONSORSHIP"},{"code":"7rlju0qr","amount":300000,"category":"SPONSORSHIP"},{"code":"v55s4xkb","amount":300000,"category":"SPONSORSHIP"},{"code":"j5gkn6vq","amount":300000,"category":"SPONSORSHIP"},{"code":"tiadhdou","amount":300000,"category":"SPONSORSHIP"},{"code":"80lx9top","amount":300000,"category":"SPONSORSHIP"},{"code":"2bwplnuh","amount":300000,"category":"SPONSORSHIP"},{"code":"b6hgz7m5","amount":300000,"category":"SPONSORSHIP"},{"code":"ps3y6qfh","amount":300000,"category":"SPONSORSHIP"},{"code":"ugn6tkz6","amount":300000,"category":"SPONSORSHIP"},{"code":"n2m79pua","amount":300000,"category":"SPONSORSHIP"},{"code":"s71ytf9o","amount":300000,"category":"SPONSORSHIP"},{"code":"wuw1wsgc","amount":300000,"category":"SPONSORSHIP"},{"code":"e4ouc658","amount":300000,"category":"SPONSORSHIP"},{"code":"gh1hotgh","amount":300000,"category":"SPONSORSHIP"},{"code":"hn461hy3","amount":300000,"category":"SPONSORSHIP"},{"code":"4vhc5zn5","amount":300000,"category":"SPONSORSHIP"},{"code":"8puf69gl","amount":300000,"category":"SPONSORSHIP"},{"code":"2uqdqej2","amount":300000,"category":"SPONSORSHIP"},{"code":"x9t006iz","amount":300000,"category":"SPONSORSHIP"},{"code":"7120d45i","amount":300000,"category":"SPONSORSHIP"},{"code":"i63xpxxz","amount":300000,"category":"SPONSORSHIP"},{"code":"ugyi4ii9","amount":300000,"category":"SPONSORSHIP"},{"code":"gyzkxca2","amount":300000,"category":"SPONSORSHIP"},{"code":"bxsbf0oc","amount":300000,"category":"SPONSORSHIP"},{"code":"be2tae3u","amount":300000,"category":"SPONSORSHIP"},{"code":"9jr69eke","amount":300000,"category":"SPONSORSHIP"},{"code":"hh5ruup4","amount":300000,"category":"SPONSORSHIP"},{"code":"y9qbouya","amount":300000,"category":"SPONSORSHIP"},{"code":"xx24iq9b","amount":300000,"category":"SPONSORSHIP"},{"code":"v1ugopsp","amount":300000,"category":"SPONSORSHIP"},{"code":"iv8d5wpt","amount":300000,"category":"SPONSORSHIP"},{"code":"y6s06gu1","amount":300000,"category":"SPONSORSHIP"},{"code":"puaae8j3","amount":300000,"category":"SPONSORSHIP"},{"code":"0wqqwojy","amount":300000,"category":"SPONSORSHIP"},{"code":"0fp5cbvz","amount":300000,"category":"SPONSORSHIP"},{"code":"fo8gk0wd","amount":300000,"category":"SPONSORSHIP"},{"code":"1glxl2jn","amount":300000,"category":"SPONSORSHIP"},{"code":"rp9d33e0","amount":300000,"category":"SPONSORSHIP"},{"code":"s00vs4ii","amount":300000,"category":"SPONSORSHIP"},{"code":"oz7zruw3","amount":300000,"category":"SPONSORSHIP"},{"code":"178vx4sl","amount":300000,"category":"SPONSORSHIP"},{"code":"jd47m1kk","amount":300000,"category":"SPONSORSHIP"},{"code":"npkp52kz","amount":300000,"category":"SPONSORSHIP"},{"code":"89y7ixy1","amount":300000,"category":"SPONSORSHIP"},{"code":"p54qo5d7","amount":300000,"category":"SPONSORSHIP"},{"code":"lmlr3jgb","amount":300000,"category":"SPONSORSHIP"},{"code":"kcxar38a","amount":300000,"category":"SPONSORSHIP"},{"code":"ggtrvj8a","amount":300000,"category":"SPONSORSHIP"},{"code":"1vmkmx5m","amount":300000,"category":"SPONSORSHIP"},{"code":"6rmzvh2u","amount":300000,"category":"SPONSORSHIP"},{"code":"o89q5xsm","amount":300000,"category":"SPONSORSHIP"},{"code":"vkby2knu","amount":300000,"category":"SPONSORSHIP"},{"code":"65yqhsof","amount":300000,"category":"SPONSORSHIP"},{"code":"2mqlzxdo","amount":300000,"category":"SPONSORSHIP"},{"code":"okeg5zxn","amount":300000,"category":"SPONSORSHIP"},{"code":"s81r1sp5","amount":300000,"category":"SPONSORSHIP"},{"code":"m8kz6jy5","amount":300000,"category":"SPONSORSHIP"},{"code":"oepjnygb","amount":300000,"category":"SPONSORSHIP"},{"code":"porzph2u","amount":300000,"category":"SPONSORSHIP"},{"code":"pzir0nyy","amount":300000,"category":"SPONSORSHIP"},{"code":"gxtfhn07","amount":300000,"category":"SPONSORSHIP"},{"code":"qfkz9mti","amount":300000,"category":"SPONSORSHIP"},{"code":"talltcxo","amount":300000,"category":"SPONSORSHIP"},{"code":"wj8i1btr","amount":300000,"category":"SPONSORSHIP"},{"code":"58joue0m","amount":300000,"category":"SPONSORSHIP"},{"code":"ioqj776j","amount":300000,"category":"SPONSORSHIP"},{"code":"sdf97nah","amount":300000,"category":"SPONSORSHIP"},{"code":"2eaqpt4d","amount":300000,"category":"SPONSORSHIP"},{"code":"7ecyhnqs","amount":300000,"category":"SPONSORSHIP"},{"code":"v55zmbt4","amount":300000,"category":"SPONSORSHIP"},{"code":"dvytavd9","amount":300000,"category":"SPONSORSHIP"},{"code":"w8wty4n5","amount":300000,"category":"SPONSORSHIP"},{"code":"jcj5yf3e","amount":300000,"category":"SPONSORSHIP"},{"code":"8vayv2nd","amount":300000,"category":"SPONSORSHIP"},{"code":"uc7u7ype","amount":300000,"category":"SPONSORSHIP"},{"code":"c9jzxl89","amount":300000,"category":"SPONSORSHIP"},{"code":"0tsyxodq","amount":300000,"category":"SPONSORSHIP"},{"code":"ugm8oxyo","amount":300000,"category":"SPONSORSHIP"},{"code":"2pku3zio","amount":300000,"category":"SPONSORSHIP"},{"code":"9nybqlvg","amount":300000,"category":"SPONSORSHIP"},{"code":"al54x8fp","amount":300000,"category":"SPONSORSHIP"},{"code":"vigmsmr8","amount":300000,"category":"SPONSORSHIP"},{"code":"kghw9eoj","amount":300000,"category":"SPONSORSHIP"},{"code":"rdazrrk9","amount":300000,"category":"SPONSORSHIP"},{"code":"wh00ck5g","amount":300000,"category":"SPONSORSHIP"},{"code":"9pvxtg3y","amount":300000,"category":"SPONSORSHIP"},{"code":"v7yj8eyr","amount":300000,"category":"SPONSORSHIP"},{"code":"9ff7ujx0","amount":300000,"category":"SPONSORSHIP"},{"code":"kpxw3r5h","amount":300000,"category":"SPONSORSHIP"},{"code":"cswxw4xb","amount":300000,"category":"SPONSORSHIP"},{"code":"0w2fsnm0","amount":300000,"category":"SPONSORSHIP"},{"code":"sn1smxwt","amount":300000,"category":"SPONSORSHIP"},{"code":"lhowly1o","amount":300000,"category":"SPONSORSHIP"},{"code":"9rxadl6c","amount":300000,"category":"SPONSORSHIP"},{"code":"aihr98gc","amount":300000,"category":"SPONSORSHIP"},{"code":"6hnngafd","amount":300000,"category":"SPONSORSHIP"},{"code":"ku2654hu","amount":300000,"category":"SPONSORSHIP"},{"code":"i5436zao","amount":300000,"category":"SPONSORSHIP"},{"code":"7suquv0v","amount":300000,"category":"SPONSORSHIP"},{"code":"jfrhu18l","amount":300000,"category":"SPONSORSHIP"},{"code":"yew7qmvv","amount":300000,"category":"SPONSORSHIP"},{"code":"zdutmoah","amount":300000,"category":"SPONSORSHIP"},{"code":"b6ds7byq","amount":300000,"category":"SPONSORSHIP"},{"code":"qlemikow","amount":300000,"category":"SPONSORSHIP"},{"code":"avr0vrnk","amount":300000,"category":"SPONSORSHIP"},{"code":"2vgsojog","amount":300000,"category":"SPONSORSHIP"},{"code":"c7w3wjdc","amount":300000,"category":"SPONSORSHIP"},{"code":"1ykxwr3c","amount":300000,"category":"SPONSORSHIP"},{"code":"79b5f6y1","amount":300000,"category":"SPONSORSHIP"},{"code":"g2autaql","amount":300000,"category":"SPONSORSHIP"},{"code":"oa8pg7te","amount":300000,"category":"SPONSORSHIP"},{"code":"ju7ox9vf","amount":300000,"category":"SPONSORSHIP"},{"code":"ofrub9i0","amount":300000,"category":"SPONSORSHIP"},{"code":"ylh7lpt0","amount":300000,"category":"SPONSORSHIP"},{"code":"qc78r0gk","amount":300000,"category":"SPONSORSHIP"},{"code":"nmwvyyyz","amount":300000,"category":"SPONSORSHIP"},{"code":"rinmt2qf","amount":300000,"category":"SPONSORSHIP"},{"code":"8xusru2t","amount":300000,"category":"SPONSORSHIP"},{"code":"8bxs0i09","amount":300000,"category":"SPONSORSHIP"},{"code":"xz8y6hvc","amount":300000,"category":"SPONSORSHIP"},{"code":"bbwt22gz","amount":300000,"category":"SPONSORSHIP"},{"code":"sbhebhz1","amount":300000,"category":"SPONSORSHIP"},{"code":"dtxpc3yw","amount":300000,"category":"SPONSORSHIP"},{"code":"9s5r4733","amount":300000,"category":"SPONSORSHIP"},{"code":"el17yay9","amount":300000,"category":"SPONSORSHIP"},{"code":"3eaonu9c","amount":300000,"category":"SPONSORSHIP"},{"code":"1tvx4xmn","amount":300000,"category":"SPONSORSHIP"},{"code":"k42iorvm","amount":300000,"category":"SPONSORSHIP"},{"code":"t32zh0e6","amount":300000,"category":"SPONSORSHIP"},{"code":"jxvv1cla","amount":300000,"category":"SPONSORSHIP"},{"code":"zc3xws87","amount":300000,"category":"SPONSORSHIP"},{"code":"u2resoqq","amount":300000,"category":"SPONSORSHIP"},{"code":"aandejm4","amount":300000,"category":"SPONSORSHIP"},{"code":"5yemn4sl","amount":300000,"category":"SPONSORSHIP"},{"code":"tbnpy3ep","amount":300000,"category":"SPONSORSHIP"},{"code":"hychk84u","amount":300000,"category":"SPONSORSHIP"},{"code":"ubv1g474","amount":300000,"category":"SPONSORSHIP"},{"code":"cl0ba8s0","amount":300000,"category":"SPONSORSHIP"},{"code":"gff692wf","amount":300000,"category":"SPONSORSHIP"},{"code":"pu0quj9f","amount":300000,"category":"SPONSORSHIP"},{"code":"am907lek","amount":300000,"category":"SPONSORSHIP"},{"code":"9ql6y5t2","amount":300000,"category":"SPONSORSHIP"},{"code":"bdyz2g0j","amount":300000,"category":"SPONSORSHIP"},{"code":"zwsaflsb","amount":300000,"category":"SPONSORSHIP"},{"code":"5os52ar4","amount":300000,"category":"SPONSORSHIP"},{"code":"1c0x2wrj","amount":300000,"category":"SPONSORSHIP"},{"code":"a51y6e14","amount":300000,"category":"SPONSORSHIP"},{"code":"h7hb4xfj","amount":300000,"category":"SPONSORSHIP"},{"code":"9vu2wsuw","amount":300000,"category":"SPONSORSHIP"},{"code":"gnb91613","amount":300000,"category":"SPONSORSHIP"},{"code":"ng5gbf5f","amount":300000,"category":"SPONSORSHIP"},{"code":"84g9tuta","amount":300000,"category":"SPONSORSHIP"},{"code":"jgpho5xy","amount":300000,"category":"SPONSORSHIP"},{"code":"4hyx3w4u","amount":300000,"category":"SPONSORSHIP"},{"code":"wcggagtz","amount":300000,"category":"SPONSORSHIP"},{"code":"0u0iqux6","amount":300000,"category":"SPONSORSHIP"},{"code":"vetmlnk6","amount":300000,"category":"SPONSORSHIP"},{"code":"59x8qym7","amount":300000,"category":"SPONSORSHIP"},{"code":"femujbdb","amount":300000,"category":"SPONSORSHIP"},{"code":"vc47ls3v","amount":300000,"category":"SPONSORSHIP"},{"code":"k644t5xx","amount":300000,"category":"SPONSORSHIP"},{"code":"fbg2z5t4","amount":300000,"category":"SPONSORSHIP"},{"code":"torz8v7o","amount":300000,"category":"SPONSORSHIP"},{"code":"35oddmsd","amount":300000,"category":"SPONSORSHIP"},{"code":"fju2sivl","amount":300000,"category":"SPONSORSHIP"},{"code":"30f60tfa","amount":300000,"category":"SPONSORSHIP"},{"code":"oqm3nsn3","amount":300000,"category":"SPONSORSHIP"},{"code":"e7p7viq9","amount":300000,"category":"SPONSORSHIP"},{"code":"t2fr4ldx","amount":300000,"category":"SPONSORSHIP"},{"code":"9wc5n1no","amount":300000,"category":"SPONSORSHIP"},{"code":"6qanis20","amount":300000,"category":"SPONSORSHIP"},{"code":"mcz2ib81","amount":300000,"category":"SPONSORSHIP"},{"code":"dz0p9sod","amount":300000,"category":"SPONSORSHIP"},{"code":"ozxe0zy6","amount":300000,"category":"SPONSORSHIP"},{"code":"m4jmmf9r","amount":300000,"category":"SPONSORSHIP"},{"code":"0mnqfijr","amount":300000,"category":"SPONSORSHIP"},{"code":"g2z9ddh8","amount":300000,"category":"SPONSORSHIP"},{"code":"xh051qt6","amount":300000,"category":"SPONSORSHIP"},{"code":"uk2l29le","amount":300000,"category":"SPONSORSHIP"},{"code":"d4gmjxna","amount":300000,"category":"SPONSORSHIP"},{"code":"3h1vrgyl","amount":300000,"category":"SPONSORSHIP"},{"code":"t42ugmbh","amount":300000,"category":"SPONSORSHIP"},{"code":"wsv1z3g4","amount":300000,"category":"SPONSORSHIP"},{"code":"fimwrvse","amount":300000,"category":"SPONSORSHIP"},{"code":"9shvudc2","amount":300000,"category":"SPONSORSHIP"},{"code":"uluvk6bi","amount":300000,"category":"SPONSORSHIP"},{"code":"tn9fxyew","amount":300000,"category":"SPONSORSHIP"},{"code":"9mjrv9ft","amount":300000,"category":"SPONSORSHIP"},{"code":"i0ibldxb","amount":300000,"category":"SPONSORSHIP"},{"code":"ui4p6qkn","amount":300000,"category":"SPONSORSHIP"},{"code":"ezkylj7f","amount":300000,"category":"SPONSORSHIP"},{"code":"cafc2z39","amount":300000,"category":"SPONSORSHIP"},{"code":"f6mqpdi4","amount":300000,"category":"SPONSORSHIP"},{"code":"ln0on58v","amount":300000,"category":"SPONSORSHIP"},{"code":"pkwez4ny","amount":300000,"category":"SPONSORSHIP"},{"code":"pq2nxxik","amount":300000,"category":"SPONSORSHIP"},{"code":"gnfyj2ec","amount":300000,"category":"SPONSORSHIP"},{"code":"6b5ejfcv","amount":300000,"category":"SPONSORSHIP"},{"code":"gjgis7hg","amount":300000,"category":"SPONSORSHIP"},{"code":"9hgjuqhd","amount":300000,"category":"SPONSORSHIP"},{"code":"rz3ckn4w","amount":300000,"category":"SPONSORSHIP"},{"code":"hj4qeqyz","amount":300000,"category":"SPONSORSHIP"},{"code":"5cgsn8zd","amount":300000,"category":"SPONSORSHIP"},{"code":"rxft8aw2","amount":300000,"category":"SPONSORSHIP"},{"code":"5rj88e97","amount":300000,"category":"SPONSORSHIP"},{"code":"fka7worm","amount":300000,"category":"SPONSORSHIP"},{"code":"ewxcnl4y","amount":300000,"category":"SPONSORSHIP"},{"code":"rl9q18rh","amount":300000,"category":"SPONSORSHIP"},{"code":"aoqm1d96","amount":300000,"category":"SPONSORSHIP"},{"code":"bhutcjcb","amount":300000,"category":"SPONSORSHIP"},{"code":"br03kr8f","amount":300000,"category":"SPONSORSHIP"},{"code":"x53xvfao","amount":300000,"category":"SPONSORSHIP"},{"code":"xbnmb695","amount":300000,"category":"SPONSORSHIP"}]');

            foreach ($tickets as $index => $ticket) {
                $ticket->code = $codes[$index]->code;
                $ticket->save();
            }

            $tickets2 = Ticket::whereIn('ticket_id', ['275952'])
                ->get();

            $codes2 = json_decode('[{"code":"62x0xxnt","amount":500000,"category":"VIP"},{"code":"kw4fhiz5","amount":500000,"category":"VIP"},{"code":"ov45shlu","amount":500000,"category":"VIP"},{"code":"slsleptn","amount":500000,"category":"VIP"},{"code":"0vocmgcf","amount":500000,"category":"VIP"},{"code":"f2wgc3js","amount":500000,"category":"VIP"},{"code":"zihy3s80","amount":500000,"category":"VIP"},{"code":"22su0dy2","amount":500000,"category":"VIP"},{"code":"gde51agt","amount":500000,"category":"VIP"},{"code":"n7c8eqla","amount":500000,"category":"VIP"},{"code":"m7i9h048","amount":500000,"category":"VIP"},{"code":"vvq5n2j4","amount":500000,"category":"VIP"},{"code":"od4f9iwu","amount":500000,"category":"VIP"},{"code":"ny7p72z4","amount":500000,"category":"VIP"},{"code":"9kpxsq2o","amount":500000,"category":"VIP"},{"code":"3rnivc0w","amount":500000,"category":"VIP"},{"code":"md46mwab","amount":500000,"category":"VIP"},{"code":"i6ia9ln4","amount":500000,"category":"VIP"},{"code":"il2df2s3","amount":500000,"category":"VIP"},{"code":"c5njbzsw","amount":500000,"category":"VIP"},{"code":"swwen0rs","amount":500000,"category":"VIP"},{"code":"qd1ne0j2","amount":500000,"category":"VIP"},{"code":"5ndldhdz","amount":500000,"category":"VIP"},{"code":"h3wff72u","amount":500000,"category":"VIP"},{"code":"8bq008ra","amount":500000,"category":"VIP"},{"code":"x8ecmb7b","amount":500000,"category":"VIP"},{"code":"ch3y5jx5","amount":500000,"category":"VIP"},{"code":"d2nzlena","amount":500000,"category":"VIP"},{"code":"20ay8pjy","amount":500000,"category":"VIP"},{"code":"ik4vnl9u","amount":500000,"category":"VIP"},{"code":"k33zzlmm","amount":500000,"category":"VIP"}]');

            foreach ($tickets2 as $index2 => $ticket2) {
                $ticket2->code = $codes2[$index2]->code;
                $ticket2->save();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {

        });
    }
};