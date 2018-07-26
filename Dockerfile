FROM mojdigital/wordpress-base:latest

ADD . /bedrock

WORKDIR /bedrock

ARG COMPOSER_USER
ARG COMPOSER_PASS

RUN make clean && \
    bin/composer-auth.sh && \
    make build && \
    rm -f auth.json
