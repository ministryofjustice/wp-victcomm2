FROM ministryofjustice/wordpress-base:latest

ADD . /bedrock

# Modify Imagemagick policy file to prevent
# "Fatal error: Uncaught ImagickException: not authorized"
# See https://stackoverflow.com/questions/37599727/php-imagickexception-not-authorized
RUN sed -i 's\<policy domain="coder" rights="none" pattern="PDF" />\<policy domain="coder" rights="read|write" pattern="PDF" />\' /etc/ImageMagick-6/policy.xml

WORKDIR /bedrock

ARG COMPOSER_USER
ARG COMPOSER_PASS

RUN chmod +x bin/* && sleep 1 && \
	#make clean && \
    bin/composer-auth.sh && \
    make build && \
    rm -f auth.json
